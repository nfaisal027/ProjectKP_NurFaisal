<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    public function index()
    {
        $data = category::all();
        return view('admin.kategori.category',compact('data'));
    }

    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success','data berhasil dihapus');
    }

    public function create(CategoryRequest $request)
    {
        $attr = [
            'name' => $request->name,
            'slug' => SlugService::createSlug(category::class,'slug',$request->name)
        ];
        category::create($attr);
        return redirect()->back()->with('success','Kategori Berhasil Ditambahkan');
    }

    public function show(category $category)
    {
        // return $category;
        return view('admin.kategori.show',compact('category'));
    }

    public function update($id,CategoryRequest $request)
    {
        $cat = category::find($id);
        $cat->name = $request->name;
        $cat->slug = SlugService::createSlug(category::class,'slug',$request->name);
        $cat->save();

        return redirect()->back()->with('success','Kategori Berhasil Di Update');
    }
}
