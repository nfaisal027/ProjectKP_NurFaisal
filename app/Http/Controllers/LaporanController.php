<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function hitungSumHarian() {
        $transaksis = Transaksi::select(
            DB::raw('DAY(created_at) AS hari'),
            DB::raw('MONTH(created_at) AS bulan'),
            DB::raw('YEAR(created_at) AS tahun'),
            DB::raw('SUM(total) AS total_harian')
        )
        ->where('status','Success')
        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'), DB::raw('DAY(created_at)'))
        ->get();

        return $transaksis;
        
    }
    

    public function index()
    {
        $tahunSekarang = date('Y');
        $harian = $this->hitungSumHarian();
        /* $bulanan = $this->hitungSumBulanan($tahunSekarang);
        $tahunan = $this->hitungSumTahunan();

        dd($bulanan); */

        return view('admin.laporan.laporan',compact('harian'));
    }

    
}
