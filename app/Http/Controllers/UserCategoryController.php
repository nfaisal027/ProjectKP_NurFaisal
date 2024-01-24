<?php

namespace App\Http\Controllers;

use App\Models\category;

class UserCategoryController extends Controller
{
    public function index($slug)
    {
        $cat = category::with('produk')->where('slug',$slug)->get();
        return view('user.category', compact('cat'));
    }
}
