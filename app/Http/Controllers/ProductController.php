<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\brand;
use App\Models\category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Delete Product!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $data = Product::with(['category','brand'])->orderBy('id','desc')->get();
        $cat = category::get();
        $brand = brand::get();
        return view('admin.produk.product',compact('data','cat','brand'));
    }
    public function store(ProductRequest $req)
    {
        $attr = $req->all();
        $attr['slug']  = SlugService::createSlug(Product::class,'slug',$req->name);
        if($req->file('img1')){
            $attr['img1'] = $req->file('img1')->store('img');
        }
        if($req->file('img2')){
            $attr['img2'] = $req->file('img2')->store('img');
        }
        if($req->file('img3')){
            $attr['img3'] = $req->file('img3')->store('img');
        }
        if($req->file('img4')){
            $attr['img4'] = $req->file('img4')->store('img');
        }
        Product::create($attr);
        Alert::toast('Data berhasil ditambahkan','success');
        return redirect()->back();
    }
    public function spek(Product $product)
    {
        return view('admin.produk.spek',compact('product'));
    }
    public function destroy($id)
    {
        $del = Product::find($id);
        if($del->img1){
            Storage::delete($del->img1);
        }
        if($del->img2){
            Storage::delete($del->img2);
        }
        if($del->img3){
            Storage::delete($del->img3);
        }
        if($del->img4){
            Storage::delete($del->img4);
        }
        $del->delete();
        Alert::toast('Data berhasil dihapus','error');
        return redirect()->back();
    }
    public function show(Product $product)
    {
        $cat = category::get();
        $brand = brand::get();
        return view('admin.produk.show',compact('product','cat','brand'));
    }
    public function update($id,ProductRequest $request)
    {
        $produk = Product::find($id);
        $produk->name = $request->name;
        $produk->category_id = $request->category_id;
        $produk->brand_id = $request->brand_id;
        $produk->price = $request->price;
        $produk->spesifikasi = $request->spesifikasi;
        $produk->stock = $request->stock;
        $produk->berat = $request->berat;
        $produk->slug = SlugService::createSlug(Product::class,'slug',$request->name);
        if($request->file('img1')){
            if ($request->oldImg1) {
                Storage::delete($request->oldImg1);
            }
            $produk->img1 = $request->file('img1')->store('img');
        }
        if($request->file('img2')){
            if ($request->oldImg2) {
                Storage::delete($request->oldImg2);
            }
            $produk->img2 = $request->file('img2')->store('img');
        }
        if($request->file('img3')){
            if ($request->oldImg3) {
                Storage::delete($request->oldImg3);
            }
            $produk->img3 = $request->file('img3')->store('img');
        }
        if($request->file('img4')){
            if ($request->oldImg4) {
                Storage::delete($request->oldImg4);
            }
            $produk->img4 = $request->file('img4')->store('img');
        }
        $produk->save();

        Alert::toast('Data berhasil diupdate','success');
        return redirect()->back();
    }
}
