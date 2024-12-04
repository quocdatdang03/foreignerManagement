<?php

namespace App\Http\Controllers;

use App\Models\CoSoLuuTru;
use App\Models\QuocTich;
use App\Services\NguoiNuocNgoaiService;
use App\Http\Requests\NguoiNuocNgoaiRequest;
use App\Models\NguoiNuocNgoai;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $idNguoiDung = Auth::id();

        if (Auth::user()->idVaiTro == 2) {
            $cosos = CoSoLuuTru::all();
        } 
        if (Auth::user()->idVaiTro == 1) {
            $cosos = CoSoLuuTru::where('idNguoiDung', $idNguoiDung)->get();
        }
        
        $quoctichs = QuocTich::all();
        return view('nguoinuocngoais.create', compact('cosos', 'quoctichs'));
    }

    // Xử lý form đăng ký và lưu dữ liệu vào cả 2 bảng
    public function store(NguoiNuocNgoaiRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('tepDinhKem')) {
            $file = $request->file('tepDinhKem');

            // Upload file lên Cloudinary
            $uploadedFile = Cloudinary::upload($file->getRealPath(), [
                'folder' => 'giay_phep'
            ]);

            //dd($uploadedFile->getSecurePath());

            // Lấy URL của tệp đã upload từ đối tượng trả về
            $data['tepDinhKem'] = $uploadedFile->getSecurePath();
        }

        // Gọi service để xử lý đăng ký và lưu dữ liệu
        $this->nguoiNuocNgoaiService->registerNguoiNuocNgoai($data);

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
        $validated = $request->validate(
            [
                'hoTen' => 'required|string|max:255',
                'soPassport' => 'required|string|max:255',
                'sdt' => 'required|string|max:10',
                'email' => 'required|email|max:255',
                'ngaySinh' => 'required|date',
                'idQuocTich' => 'required|exists:quoc_tichs,idQuocTich',
            ],
            [
                'hoTen.required' => 'Họ tên không được để trống.',
                'hoTen.max' => 'Họ tên không được vượt quá 255 ký tự.',
                'soPassport.required' => 'Số passport không được để trống.',
                'soPassport.max' => 'Số passport không được vượt quá 255 ký tự.',
                'sdt.required' => 'Số điện thoại không được để trống.',
                'sdt.max' => 'Số điện thoại không được vượt quá 10 ký tự.',
                'email.required' => 'Email không được để trống.',
                'email.email' => 'Email không hợp lệ.',
                'email.max' => 'Email không được vượt quá 255 ký tự.',
                'ngaySinh.required' => 'Ngày sinh không được để trống.',
                'ngaySinh.date' => 'Ngày sinh phải là định dạng ngày hợp lệ.',
                'idQuocTich.required' => 'Quốc tịch không được để trống.',
                'idQuocTich.exists' => 'Quốc tịch không tồn tại trong hệ thống.',
            ]
        );
        
        $updatedNguoiNuocNgoai = $this->nguoiNuocNgoaiService->updateNguoiNuocNgoai($id, $validated);
        return redirect()->route('nguoinuocngoais.index')
                        ->with('success', 'Cập nhật thông tin người nước ngoài thành công!');
    }
}
