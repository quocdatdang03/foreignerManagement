<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function index(Request $request)
    {
        $tongSoNguoiNuocNgoai = DB::table('nguoi_nuoc_ngoais')->count();
        $tongSoCoSoLuuTru = DB::table('co_so_luu_trus')->count();
        $giayPhepDaPheDuyet = DB::table('giay_pheps')
            ->where('trangThai', 'Đã phê duyệt')
            ->count();

        $loaiHinh = DB::table('co_so_luu_trus')
        ->select('loaiHinh', DB::raw('count(*) as soLuong'))
        ->groupBy('loaiHinh')
        ->get();

        $quocTich = DB::table('nguoi_nuoc_ngoais')
            ->join('quoc_tichs', 'quoc_tichs.idQuocTich', '=', 'nguoi_nuoc_ngoais.idQuocTich')
            ->select('quoc_tichs.idQuocTich','quoc_tichs.tenQuocTich', DB::raw('count(*) as soLuong'))
            ->groupBy('quoc_tichs.idQuocTich','quoc_tichs.tenQuocTich')
            ->orderByDesc('soLuong')
            ->limit(9)
            ->get();
        $soLuongQuocTichKhac = DB::table('nguoi_nuoc_ngoais')
            ->whereNotIn('idQuocTich', $quocTich->pluck('idQuocTich')->toArray())
            ->count();
        $quocTich->push((object)[
            'tenQuocTich' => 'Quốc tịch khác',
            'soLuong' => $soLuongQuocTichKhac,
        ]);

        $coSoMoiNhats = \App\Models\CoSoLuuTru::with('nguoiDung')
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

         $selectedYear = date('Y');

         $years = DB::table('giay_pheps')
            ->select(DB::raw('YEAR(ngayCap) as year'))
            ->distinct()
            ->orderByDesc('year')
            ->get();

        $giayPhepData = DB::table('giay_pheps')
            ->select(DB::raw('MONTH(ngayCap) as month'), DB::raw('COUNT(*) as soLuong'))
            ->whereYear('ngayCap', $selectedYear)
            ->groupBy(DB::raw('MONTH(ngayCap)'))
            ->orderBy('month')
            ->get();

        $months = [];
        $soLuong = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthData = $giayPhepData->firstWhere('month', $i);
            $months[] = "Tháng $i";
            $soLuong[] = $monthData ? $monthData->soLuong : 0;
        }


        return view('thongke.index',
        compact('tongSoNguoiNuocNgoai', 'tongSoCoSoLuuTru', 'loaiHinh', 'giayPhepDaPheDuyet', 'quocTich', 'coSoMoiNhats','months', 'soLuong', 'selectedYear', 'years'));
    }

    public function getGiayPhepData(Request $request)
    {
        $year = $request->input('year', date('Y'));

        $giayPhepData = DB::table('giay_pheps')
           ->selectRaw('MONTH(ngayCap) as month, COUNT(*) as soLuong')
           ->whereYear('ngayCap', $year)
           ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $soLuong = [];

        for ($i = 1; $i <= 12; $i++) {
            $data = $giayPhepData->firstWhere('month', $i);
            $months[] = "Tháng $i";
            $soLuong[] = $data ? $data->soLuong : 0;
        }

        return response()->json(['months' => $months, 'soLuong' => $soLuong]);
    }
}
