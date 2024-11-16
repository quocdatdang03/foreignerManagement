<?php

namespace App\Http\Controllers;

use App\Models\CoSoLuuTru;
use App\Models\GiayPhep;
use App\Models\QuocTich;
use App\Services\GiayPhepService;
use Illuminate\Http\Request;

class GiayPhepController extends Controller
{
    protected $giayPhepService;

    public function __construct(GiayPhepService $giayPhepService)
    {
        $this->giayPhepService = $giayPhepService;
    }

    public function index(Request $request)
    {
        // Lấy các bộ lọc từ query parameters
        $filters = $request->only(['keyword']);
        $giayPheps = $this->giayPhepService->getAllGiayPheps($filters);

        return view('giaypheps.index', compact('giayPheps'));
    }

    // public function edit($id)
    // {
    //     $coSos = CoSoLuuTru::all();
    //     $quocTichs  = QuocTich::all();
    //     $giayPhep = $this->giayPhepService->getGiayPhepById($id);
    //     return view('giaypheps.edit', compact('giayPhep', 'quocTichs', 'coSos'));
    // }

    public function edit($id)
{
        // Retrieve all CoSoLuuTru and QuocTichs for dropdown options
        $coSos = CoSoLuuTru::all();
        $quocTichs = QuocTich::all();

        // Retrieve the GiayPhep with relationships to NguoiNuocNgoai and CoSoLuuTru
        $giayPhep = GiayPhep::with(['nguoiNuocNgoai', 'coSo'])->find($id);

        // dd($giayPhep->ngayDen, $giayPhep->nguoiNuocNgoai->idQuocTich, $giayPhep->idCoSo, $giayPhep->ngayDuKienRoiKhoi);


        // Return the edit view with GiayPhep, QuocTichs, and CoSos
        return view('giaypheps.edit', compact('giayPhep', 'quocTichs', 'coSos'));
}


    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'hoTen' => 'required|string|max:255',
            'soPassport' => 'required|string|max:255',
            'sdt' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'ngaySinh' => 'required|date',
            'ngayDen' => 'required|date',
            'lyDoDen' => 'required|string|max:255',
            'idQuocTich' => 'required|exists:quoc_tichs,idQuocTich',
            'idCoSo' => 'required|exists:co_so_luu_trus,idCoSo',
            'ngayDuKienRoiKhoi' => 'required|date',
        ]);
        // dd($validated);
        $updatedGiayPhep = $this->giayPhepService->updateGiayPhep($id, $validated);
        return redirect()->route('giaypheps.index')->with('success', 'Cập nhật giấy phép thành công!');
    }

    public function destroy($id)
    {
        $this->giayPhepService->deleteGiayPhep($id);
        return redirect()->route('giaypheps.index')->with('success', 'Xóa giấy phép thành công!');
    }
}
