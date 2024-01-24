<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('index', compact('data'));
    }
}
