<?php

namespace App\Services;

use App\Models\NguoiNuocNgoai;
use App\Models\GiayPhep;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NguoiNuocNgoaiService
{

     public function getAllNguoiNuocNgoais($filters = [])
    {
        $query = NguoiNuocNgoai::query()
            ->with(['quocTich']);

        // // Get the combined search string
        // if (isset($filters['keyword']) && $filters['keyword']) {
        //     $searchTerms = explode(' ', $filters['keyword']);  // Split by space

        //     // Loop through each search term and apply it to multiple columns
        //     foreach ($searchTerms as $term) {
        //         $query->where(function($query) use ($term) {
        //             $query->whereHas('nguoiNuocNgoai', function ($query) use ($term) {
        //                 $query->where('hoTen', 'like', '%' . $term . '%')
        //                     ->orWhere('soPassport', 'like', '%' . $term . '%');
        //             })
        //             ->orWhere('ngayDen', 'like', '%' . $term . '%');
        //         });
        //     }
        // }

        // Phân trang
        return $query->paginate(3);  // Phân trang 3 mục mỗi trang
    }

    public function registerNguoiNuocNgoai($data)
    {
        // Lưu thông tin người nước ngoài vào bảng NguoiNuocNgoai
        $nguoiNuocNgoai = new NguoiNuocNgoai();
        $nguoiNuocNgoai->hoTen = $data['hoTen'];
        $nguoiNuocNgoai->soPassport = $data['soPassport'];
        $nguoiNuocNgoai->sdt = $data['sdt'];
        $nguoiNuocNgoai->email = $data['email'];
        $nguoiNuocNgoai->ngaySinh = $data['ngaySinh'];
        $nguoiNuocNgoai->idQuocTich = $data['idQuocTich'];
        $nguoiNuocNgoai->created_at = Carbon::now(); 
        $nguoiNuocNgoai->save();
        
        // Lưu thông tin giấy phép vào bảng GiayPhep
        $giayPhep = new GiayPhep();
        $giayPhep->idNguoiNuocNgoai = $nguoiNuocNgoai->idNguoiNuocNgoai;
        $giayPhep->idCoSo = $data['idCoSo'];
        $giayPhep->ngayDen = $data['ngayDen'];
        $giayPhep->lyDoDen = $data['lyDoDen'];
        $giayPhep->ngayDuKienRoiKhoi = $data['ngayDuKienRoiKhoi'];
        $giayPhep->trangThai = "Đang xử lý";
         $giayPhep->created_at = Carbon::now(); 
        $giayPhep->save();

        return $nguoiNuocNgoai;
    }

     public function getNguoiNuocNgoaiById($id)
    {
        return NguoiNuocNgoai::with(['quocTich'])->findOrFail($id);
    }

   public function updateNguoiNuocNgoai($id, $data)
    {
        DB::beginTransaction();  

        try {
            // Update GiayPhep
            $nguoiNuocNgoai = NguoiNuocNgoai::findOrFail($id);
            $nguoiNuocNgoai->update($data);

            DB::commit();  
            return $nguoiNuocNgoai;

        } catch (\Exception $e) {
            DB::rollBack();  
            throw $e;  
        }
    }

}
