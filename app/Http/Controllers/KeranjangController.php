<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeranjangRequest;
use App\Models\keranjang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KeranjangController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $keranjang = keranjang::with('product')->where('user_id', $user_id)->get();
        // $data = keranjang::find($user);
        return view('user.keranjang',compact('keranjang'));
    }
    public function store(KeranjangRequest $req)
    {
        $val = Product::find($req->product_id);
        if(!$val){
            Alert::error('Eror', 'Data Tidak ditemukan!');
            return redirect()->back();
        }

        $attr['product_id'] = $req->product_id;
        $attr['user_id'] = Auth::user()->id;
        $attr['jumlah']  = $req->jumlah ?? 1;

        keranjang::firstOrCreate($attr);
        Alert::toast('Product Berhasil ditambahkan!','success');
        return redirect()->back();
    }
    public function delete($id)
    {
        $del = keranjang::find($id);
        $del->delete();
        Alert::toast('Data berhasil dihapus','error');
        return redirect()->back();
    }
    public function update($id,Request $req)
    {
        $update = keranjang::find($id);
        $val = Product::find($req->id_product);

        if($val->stock >= $req->jumlah){
            $update->jumlah = $req->jumlah;
            $update->save();
            Alert::toast('Product Berhasil Di Update','success');
            return redirect()->back();
        }
        Alert::toast('Jumlah Stock Tidak Mencukupi','warning');
        return redirect()->back();
    }
}
