<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\brand;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BrandController extends Controller
{
    public function index()
    {
        $data = brand::get();
        return view('admin.brand.brand',compact('data'));
    }
    public function create(BrandRequest $request)
    {
        $attr = [
            'name' => $request->name,
            'slug' => SlugService::createSlug(brand::class,'slug',$request->name)
        ];
        brand::create($attr);
        return redirect()->back()->with('success','Kategori Berhasil Ditambahkan');
    }
    public function destroy($id)
    {
        brand::where('id',$id)->delete();
        return redirect()->back()->with('success','data berhasil dihapus');
    }
    public function show(brand $brand)
    {
        // dd($brand);
        return view('admin.brand.show',compact('brand'));
    }
    public function update($id,BrandRequest $request)
    {
        $merk = brand::find($id);
        $merk->name = $request->name;
        $merk->slug = SlugService::createSlug(brand::class,'slug',$request->name);
        $merk->save();

        return redirect()->back()->with('success','Brand Berhasil Di Update');
    }
}
