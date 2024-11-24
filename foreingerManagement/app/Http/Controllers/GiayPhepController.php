<?php

namespace App\Http\Controllers;

use App\Http\Requests\NguoiNuocNgoaiRequest;
use App\Mail\GiayPhepKhongPheDuyet;
use App\Mail\GiayPhepPheDuyet;
use App\Models\CoSoLuuTru;
use App\Models\GiayPhep;
use App\Models\QuocTich;
use App\Services\GiayPhepService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GiayPhepController extends Controller
{
    protected $giayPhepService;

    public function __construct(GiayPhepService $giayPhepService)
    {
        $this->giayPhepService = $giayPhepService;
    }

   public function index(Request $request)
    {
        // Lấy idNguoiDung của người dùng đang đăng nhập
        $idNguoiDung = Auth::id(); // Hoặc Auth::user()->idNguoiDung

        // Nhận các tham số từ request
        $filters = $request->only(['keyword', 'idQuocTich', 'idCoSo']);

        // Lọc danh sách cơ sở lưu trú theo idNguoiDung (nếu cần)
        $coSos = CoSoLuuTru::where('idNguoiDung', $idNguoiDung)->get();

        // Lấy danh sách quốc tịch
        $quocTichs = QuocTich::all();

        // Lấy danh sách giấy phép với các bộ lọc
        $giayPheps = $this->giayPhepService->getAllGiayPheps($filters);

        // Trả về view với các dữ liệu cần thiết
        return view('giaypheps.index', compact('giayPheps', 'coSos', 'quocTichs'));
    }

     public function index_xetduyet(Request $request)
    {
        // Lấy các bộ lọc từ query parameters
        $filters = $request->only(['keyword', 'idQuocTich', 'idCoSo']);
        $giayPheps = $this->giayPhepService->getAllGiayPheps($filters);


        $coSos = CoSoLuuTru::all();
        $quocTichs = QuocTich::all();

        return view('giaypheps.xetduyet', compact('giayPheps', 'coSos', 'quocTichs'));
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
        $idNguoiDung = Auth::id(); 
        
        $coSos = CoSoLuuTru::where('idNguoiDung', $idNguoiDung)->get();
        $quocTichs = QuocTich::all();

        // Retrieve the GiayPhep with relationships to NguoiNuocNgoai and CoSoLuuTru
        $giayPhep = GiayPhep::with(['nguoiNuocNgoai', 'coSo'])->find($id);

        // dd($giayPhep->ngayDen, $giayPhep->nguoiNuocNgoai->idQuocTich, $giayPhep->idCoSo, $giayPhep->ngayDuKienRoiKhoi);


        // Return the edit view with GiayPhep, QuocTichs, and CoSos
        return view('giaypheps.edit', compact('giayPhep', 'quocTichs', 'coSos'));
    }

    public function edit_xetduyet($id)
    {
            // Retrieve all CoSoLuuTru and QuocTichs for dropdown options
            $coSos = CoSoLuuTru::all();
            $quocTichs = QuocTich::all();

            // Retrieve the GiayPhep with relationships to NguoiNuocNgoai and CoSoLuuTru
            $giayPhep = GiayPhep::with(['nguoiNuocNgoai', 'coSo'])->find($id);

            // dd($giayPhep->ngayDen, $giayPhep->nguoiNuocNgoai->idQuocTich, $giayPhep->idCoSo, $giayPhep->ngayDuKienRoiKhoi);


            // Return the edit view with GiayPhep, QuocTichs, and CoSos
            return view('giaypheps.xetduyet_edit', compact('giayPhep', 'quocTichs', 'coSos'));
    }



    // public function update(NguoiNuocNgoaiRequest $request, $id)
    // {
       
    //     // dd($validated);
    //    $updatedGiayPhep = $this->giayPhepService->updateGiayPhep($id, $request->validated());
    //     return redirect()->route('giaypheps.index')->with('success', 'Cập nhật giấy phép thành công!');
    // }

    public function update(NguoiNuocNgoaiRequest $request, $id)
    {
        // Validate the input
        $data = $request->validated();

        $giayPhep = GiayPhep::findOrFail($id); 

        // Check if a new file is uploaded
        if ($request->hasFile('tepDinhKem')) {
            $file = $request->file('tepDinhKem');

            // Upload the new file to Cloudinary
            $uploadedFile = Cloudinary::upload($file->getRealPath(), [
                'folder' => 'giay_phep'
            ]);

            // Get the secure URL of the uploaded file
            $data['tepDinhKem'] = $uploadedFile->getSecurePath();

            // Optionally, delete the old file from Cloudinary if it exists
            if ($giayPhep->tepDinhKem) {
                $oldFilePath = parse_url($giayPhep->tepDinhKem, PHP_URL_PATH);  // Extract the file path from URL
                $publicId = basename($oldFilePath); // Get the public ID of the file
                Cloudinary::destroy($publicId); // Delete the old file from Cloudinary
            }
        } else {
            // If no new file is uploaded, keep the old file URL
            $data['tepDinhKem'] = $giayPhep->tepDinhKem;
        }

        // Call the service to update the data
        $this->giayPhepService->updateGiayPhep($id, $data);

        // Redirect back with success message
        return redirect()->route('giaypheps.index')->with('success', 'Cập nhật giấy phép thành công!');
    }


    public function destroy($id)
    {
        $this->giayPhepService->deleteGiayPhep($id);
        return redirect()->route('giaypheps.index')->with('success', 'Xóa giấy phép thành công!');
    }

    public function approve($id)
    {
        $giayPhep = GiayPhep::find($id);

        if (!$giayPhep) {
            return redirect()->route('giaypheps.index.xet_duyet')->with('error', 'Giấy phép không tồn tại.');
        }

        // Cập nhật trạng thái giấy phép thành "Đã phê duyệt"
        $giayPhep->trangThai = 'Đã phê duyệt';
        $giayPhep->lyDoKhongXetDuyet = null;
        $giayPhep->save();

        //dd($giayPhep->coSo->email);

        // Gửi email thông báo
        Mail::to($giayPhep->coSo->email)
            ->send(new GiayPhepPheDuyet($giayPhep));

        return redirect()->route('giaypheps.index.xet_duyet')->with('success', 'Giấy phép đã được phê duyệt và email đã được gửi.');
    }

    public function reject(Request $request, $id)
    {
        // Tìm kiếm giấy phép theo ID
        $giayPhep = GiayPhep::find($id);

        if (!$giayPhep) {
            return redirect()->route('giaypheps.index.xet_duyet')->with('error', 'Giấy phép không tồn tại.');
        }

        // Kiểm tra lý do từ chối có được gửi không
        $lyDoKhongXetDuyet = $request->input('lyDoKhongXetDuyet');
        if (!$lyDoKhongXetDuyet) {
            return redirect()->route('giaypheps.index.xet_duyet')->with('error', 'Vui lòng nhập lý do từ chối.');
        }

        // Cập nhật trạng thái và lý do từ chối
        $giayPhep->trangThai = 'Không phê duyệt';
        $giayPhep->lyDoKhongXetDuyet = $lyDoKhongXetDuyet;
        $giayPhep->save();

        // Gửi email thông báo
        Mail::to($giayPhep->coSo->email)
            ->send(new GiayPhepKhongPheDuyet($giayPhep));

        return redirect()->route('giaypheps.index.xet_duyet')->with('success', 'Giấy phép đã bị từ chối và email đã được gửi.');
    }

}
