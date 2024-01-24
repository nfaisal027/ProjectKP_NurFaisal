<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $tah = $this->hitungSumTahunan();
        $data = Transaksi::latest()->get();
        return view('admin.dashboard',compact('tah','data'));
    }
    public function getData(Request $request)
    {
        $data = $request->tahun ?? date('Y');
        $result = $this->hitungSumBulanan($data);

        return response()->json($result);

    }
    function hitungSumTahunan()
    {
        $tahunan = Transaksi::select(
                DB::raw('YEAR(created_at) AS tahun'),
                DB::raw('SUM(total) AS total_tahun')
            )
            ->where('status','Success') 
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();
        return $tahunan;
    }
    public function hitungSumBulanan($tahunSekarang)
    {
        return Transaksi::select(
            DB::raw('YEAR(created_at) AS tahun'),
            DB::raw('MONTH(created_at) AS bulan'),
            DB::raw('SUM(total) AS total_bulan')
            )
            ->where('status', 'Success')
            ->whereYear('created_at', $tahunSekarang)
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'), 'ASC')
            ->orderBy(DB::raw('MONTH(created_at)'), 'ASC')
            ->get();
    }
}
