<?php

namespace App\Services;

use App\Models\GiayPhep;
use App\Models\NguoiNuocNgoai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GiayPhepService
{
   public function getAllGiayPheps($filters = [])
    {
        // Lấy idNguoiDung của người dùng hiện tại
        $idNguoiDung = Auth::id();

        $query = GiayPhep::query()
            ->with(['nguoiNuocNgoai', 'coSo'])
            ->whereHas('coSo', function ($query) use ($idNguoiDung) {
                $query->where('idNguoiDung', $idNguoiDung);
            }); // Lọc theo idNguoiDung thông qua quan hệ 'coSo'

        // Filter theo keyword
        if (isset($filters['keyword']) && $filters['keyword']) {
            $searchTerms = explode(' ', $filters['keyword']); // Tách từ khóa theo khoảng trắng

            foreach ($searchTerms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->whereHas('nguoiNuocNgoai', function ($query) use ($term) {
                        $query->where('hoTen', 'like', '%' . $term . '%')
                            ->orWhere('soPassport', 'like', '%' . $term . '%');
                    });
                });
            }
        }

        // Filter theo idCoSo
        if (isset($filters['idCoSo']) && $filters['idCoSo']) {
            $query->where('idCoSo', $filters['idCoSo']);
        }

        // Filter theo idQuocTich
        if (isset($filters['idQuocTich']) && $filters['idQuocTich']) {
            $query->whereHas('nguoiNuocNgoai', function ($query) use ($filters) {
                $query->where('idQuocTich', $filters['idQuocTich']);
            });
        }

        // Phân trang
        return $query->paginate(3); // Trả về 3 mục mỗi trang
    }

    public function getGiayPhepById($id)
    {
        return GiayPhep::with(['nguoiNuocNgoai', 'coSo'])->findOrFail($id);
    }

   public function updateGiayPhep($id, $data)
    {
        DB::beginTransaction();  

        try {
            // Update GiayPhep
            $giayPhep = GiayPhep::findOrFail($id);
            $giayPhep->update($data);

            // Update NguoiNuocNgoai
            $nguoiNuocNgoai = NguoiNuocNgoai::find($id);
            if ($nguoiNuocNgoai) {
                // Update NguoiNuocNgoai fields
                $nguoiNuocNgoai->hoTen = $data['hoTen'];
                $nguoiNuocNgoai->soPassport = $data['soPassport'];
                $nguoiNuocNgoai->sdt = $data['sdt'];
                $nguoiNuocNgoai->email = $data['email'];
                $nguoiNuocNgoai->ngaySinh = $data['ngaySinh'];
                $nguoiNuocNgoai->idQuocTich = $data['idQuocTich'];
                $nguoiNuocNgoai->save();
            }

            DB::commit();  
            return $giayPhep;

        } catch (\Exception $e) {
            DB::rollBack();  
            throw $e;  
        }
    }


    public function deleteGiayPhep($id)
    {
        $giayPhep = GiayPhep::findOrFail($id);
        return $giayPhep->delete();
    }
}
