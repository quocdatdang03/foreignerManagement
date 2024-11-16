<?php

namespace App\Services;

use App\Models\GiayPhep;
use App\Models\NguoiNuocNgoai;
use Illuminate\Support\Facades\DB;

class GiayPhepService
{
   public function getAllGiayPheps($filters = [])
    {
        $query = GiayPhep::query()
            ->with(['nguoiNuocNgoai', 'coSo']);

        // Get the combined search string
        if (isset($filters['keyword']) && $filters['keyword']) {
            $searchTerms = explode(' ', $filters['keyword']);  // Split by space

            // Loop through each search term and apply it to multiple columns
            foreach ($searchTerms as $term) {
                $query->where(function($query) use ($term) {
                    $query->whereHas('nguoiNuocNgoai', function ($query) use ($term) {
                        $query->where('hoTen', 'like', '%' . $term . '%')
                            ->orWhere('soPassport', 'like', '%' . $term . '%');
                    })
                    ->orWhere('ngayDen', 'like', '%' . $term . '%');
                });
            }
        }

        // Phân trang
        return $query->paginate(3);  // Phân trang 3 mục mỗi trang
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
