<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with('detail')->latest()->get();
        return view('admin.transaksi.transaksi',compact('data'));
    }

    public function invoice(Transaksi $transaksi) {
        return view('admin.transaksi.invoice',compact('transaksi'));
    }
}
