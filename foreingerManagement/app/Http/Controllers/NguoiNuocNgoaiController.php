<?php

namespace App\Http\Controllers;

use App\Models\CoSoLuuTru;
use App\Models\QuocTich;
use App\Services\NguoiNuocNgoaiService;
use App\Http\Requests\StoreNguoiNuocNgoaiRequest;
use Illuminate\Http\Request;

class NguoiNuocNgoaiController extends Controller
{
    protected $nguoiNuocNgoaiService;

    public function __construct(NguoiNuocNgoaiService $nguoiNuocNgoaiService)
    {
        $this->nguoiNuocNgoaiService = $nguoiNuocNgoaiService;
    }

    // Hiển thị form đăng ký
    public function create()
    {
        $cosos = CoSoLuuTru::all();
        $quoctichs = QuocTich::all();
        return view('nguoinuocngoai.create', compact('cosos', 'quoctichs'));
    }

    // Xử lý form đăng ký và lưu dữ liệu vào cả 2 bảng
    public function store(StoreNguoiNuocNgoaiRequest $request)
    {
        // Gọi service để xử lý đăng ký và lưu dữ liệu
        $this->nguoiNuocNgoaiService->registerNguoiNuocNgoai($request->validated());

        return redirect()->route('nguoinuocngoai.create')->with('success', 'Đăng ký thành công');
    }
}
