<?php

namespace App\Http\Controllers;

use App\Models\brand;

class UserBrandController extends Controller
{
    public function index($slug)
    {
        $brand = brand::with('produk')->where('slug',$slug)->get();
        return view('user.brand', compact('brand'));
    }
}
