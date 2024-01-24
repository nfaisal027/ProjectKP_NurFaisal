<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index(Request $req)
    {
        $p = Product::query();
        if($req->cari != null){
            $p->where('name', 'LIKE', '%' . $req->cari . '%');
        }
        $data = $p->orderBy('created_at', 'desc')->where('stock','>','0')->paginate(12);
        return view('user.product',compact('data'));
    }
    public function spek(Product $product)
    {
        return view('user.showproduct2',compact('product'));
    }
}
