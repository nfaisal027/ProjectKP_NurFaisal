<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiRequest;
use App\Models\brand;
use App\Models\category;
use App\Models\City;
use App\Models\DetailTransaksi;
use App\Models\keranjang;
use App\Models\Product;
use App\Models\Province;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use Midtrans\Snap;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kota = City::get();
        $prov = Province::get();
        $brands = brand::get();
        $cat = category::get();

        $keranjang = keranjang::with('product')->where('user_id', $user->id)->get();
        return view('user.transaksi', compact('keranjang', 'kota', 'prov', 'user', 'cat', 'brands'));
    }


    public function bayar(Request $req)
    {

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true; // Aktifkan 3DSecure jika diperlukan

        $user = Auth::user();
        $keranjang = keranjang::with('product')->where('user_id', $user->id)->get();
        $kota = City::find($req->kota_id);

        $sum =  $keranjang->sum(function ($item) {
            return $item->product->price * $item->jumlah;
        });

        $berat = $keranjang->sum(function ($item) {
            return $item->product->berat * $item->jumlah;
        });

        $random = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$faktur = strval("PG") ."-".substr(str_shuffle($random), 0, 4)  ."-".auth()->user()->id. "-". strval(date('dmY'));

        $transaksi = new Transaksi;
        $transaksi->faktur = $faktur;
        $transaksi->user_id = $user->id;
        $transaksi->nama = $req->name;
        $transaksi->no_hp = $req->no_hp;
        $transaksi->berat = $berat;
        $transaksi->alamat_lengkap = $req->alamat;
        $transaksi->status = 'Belum Bayar';
        $transaksi->kurir = $req->courier;
        $transaksi->ongkir = $req->ongkir;
        $transaksi->total = $sum;
        $transaksi->save();

        foreach ($keranjang as $i) {
            $detailTransaksi = new DetailTransaksi();
            $detailTransaksi->transaksi_id = $transaksi->id; // Assign ID transaksi yang sesuai
            $detailTransaksi->name = $i->product->name;
            $detailTransaksi->price = $i->product->price;
            $detailTransaksi->jumlah = $i->jumlah;
            $detailTransaksi->save();
        }

        foreach ($keranjang as $i) {
            $items[] = [
                'id' => $i->product->id,
                'price' => $i->product->price,
                'quantity' => $i->jumlah,
                'name' => $i->product->name,
            ];
        }

        $items[] = [
            'id' => 'OK-1',
            'price' => $transaksi->ongkir,
            'quantity' => 1,
            'name' => "Ongkos Kirim",
        ];

        $sum  = $sum + $transaksi->ongkir;

        $transactionDetails = [
            'order_id' => $faktur,
            'gross_amount' => $sum, // total harga pesanan
        ];

        // Konfigurasi pengiriman
        $shippingAddress = [
            "first_name" => $req->name,
            'email' => $user->email,
            'phone' => $req->no_hp,
            "address" => $req->alamat,
            "city" => $kota->city_name,
            "postal_code" => $kota->postal_code,
        ];

        // Konfigurasi pelanggan
        $customerDetails = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $req->no_hp,
        ];

        // Buat data Snap Token
        $data = [
            'transaction_details' => $transactionDetails,
            'item_details' => $items,
            'customer_details' => $customerDetails,
            'shipping_address' => $shippingAddress,
        ];

        Keranjang::where('user_id', $user->id)->delete();

        
        $snapToken = snap::getSnapToken($data);

        // Redirect pengguna ke halaman pembayaran Midtrans
        return response()->json(['snapToken' => $snapToken]);
    }

    public function ongkir(Request $req)
    {
        $user = Auth::user();
        $keranjang = keranjang::with('product')->where('user_id', $user->id)->get();

        $total = $keranjang->sum(function ($item) {
            return $item->product->berat * $item->jumlah;
        });

        $response = Http::asForm()->withHeaders([
            'key' => env('RAJA_ONGKIR_KEY')
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 364, //id kabupaten bone dari table cities
            'destination' => $req->kota_id, //id kabupaten tujuan 
            'weight' => $total,
            'courier' => $req->courier
        ]);

        $data = $response['rajaongkir']['results'][0]['costs'];
        return view('user.ongkir', compact('data'));
    }
    public function getKota($id)
    {
        $res = City::where('province_id', $id)->get();
        return $res;
    }

    public function callback(Request $req)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash('sha512', $req->order_id . $req->status_code . $req->gross_amount . $serverKey);
        if ($hashed == $req->signature_key) {
            if ($req->transaction_status == 'settlement') {
                Transaksi::where('faktur',$req->order_id)->update(['status' => 'Success']);
                $transaksis = Transaksi::with('detail')->where('faktur',$req->order_id)->get();
                foreach ($transaksis[0]->detail as $i) {
                    $produk = Product::where('name',$i->name)->get();
                    $info = $produk[0]->stock - $i->jumlah;
                    Product::where('name',$i->name)->update(['stock'=>$info]);
                    // $produk->stock = $produk->stock - $i->jumlah;
                    // $produk->save();
                }
            }
        }
    }

    public function invoice(Transaksi $transaksi)
    {
        return view('user.invoice',compact('transaksi'));
    }

    public function detail()
    {
        $user = Auth::user();
        $data = Transaksi::with('detail')->where('user_id', $user->id)->get();
        return view('user.detailtransaksi',compact('data'));
    }
}
