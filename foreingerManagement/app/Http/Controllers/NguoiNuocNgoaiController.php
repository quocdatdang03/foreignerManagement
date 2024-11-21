<?php

namespace App\Http\Controllers;

use App\Models\CoSoLuuTru;
use App\Models\QuocTich;
use App\Services\NguoiNuocNgoaiService;
use App\Http\Requests\StoreNguoiNuocNgoaiRequest;
use App\Models\NguoiNuocNgoai;
use Illuminate\Http\Request;

class NguoiNuocNgoaiController extends Controller
{
    protected $nguoiNuocNgoaiService;

    public function __construct(NguoiNuocNgoaiService $nguoiNuocNgoaiService)
    {
        $this->nguoiNuocNgoaiService = $nguoiNuocNgoaiService;
    }

    public function index(Request $request)
    {
        // Lấy các bộ lọc từ query parameters
        $filters = $request->only(['keyword', 'idQuocTich']);
        $nguoiNuocNgoais = $this->nguoiNuocNgoaiService->getAllNguoiNuocNgoais($filters);

        // combine filter and paginate :
        $nguoiNuocNgoais->appends($filters);

        $quocTichs = QuocTich::all();

        return view('nguoinuocngoais.index', compact('nguoiNuocNgoais', 'quocTichs'));
    }

    // Hiển thị form đăng ký
    public function create()
    {
        $cosos = CoSoLuuTru::all();
        $quoctichs = QuocTich::all();
        return view('nguoinuocngoais.create', compact('cosos', 'quoctichs'));
    }

    // Xử lý form đăng ký và lưu dữ liệu vào cả 2 bảng
    public function store(StoreNguoiNuocNgoaiRequest $request)
    {
        // Gọi service để xử lý đăng ký và lưu dữ liệu
        $this->nguoiNuocNgoaiService->registerNguoiNuocNgoai($request->validated());

        return redirect()->route('nguoinuocngoais.create')->with('success', 'Đăng ký thành công');
    }

        public function edit($id)
    {
            $quocTichs = QuocTich::all();

            $nguoiNuocNgoai = NguoiNuocNgoai::with(['quocTich'])->find($id);

            // dd($giayPhep->ngayDen, $giayPhep->nguoiNuocNgoai->idQuocTich, $giayPhep->idCoSo, $giayPhep->ngayDuKienRoiKhoi);


            // Return the edit view with GiayPhep, QuocTichs, and CoSos
            return view('nguoinuocngoais.edit', compact('nguoiNuocNgoai', 'quocTichs'));
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
            'idQuocTich' => 'required|exists:quoc_tichs,idQuocTich',
        ]);
        // dd($validated);
        $updatedNguoiNuocNgoai = $this->nguoiNuocNgoaiService->updateNguoiNuocNgoai($id, $validated);
        return redirect()->route('nguoinuocngoais.index')
                        ->with('success', 'Cập nhật thông tin người nước ngoài thành công!');
    }
}
