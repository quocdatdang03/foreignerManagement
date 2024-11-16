<?php

namespace App\Services;

use App\Models\NguoiNuocNgoai;
use App\Models\GiayPhep;
use Carbon\Carbon;

class NguoiNuocNgoaiService
{
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
}
