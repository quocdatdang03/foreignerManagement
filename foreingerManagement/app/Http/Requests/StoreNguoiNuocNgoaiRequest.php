<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNguoiNuocNgoaiRequest extends FormRequest
{
    /**
     * Xác thực yêu cầu.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Xác thực dữ liệu yêu cầu.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hoTen' => 'required|string|max:255',
            'soPassport' => 'required|string|max:255',
            'sdt' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'ngaySinh' => 'required|date',
            'ngayDen' => 'required|date',
            'lyDoDen' => 'required|string|max:255',
            'idQuocTich' => 'required|exists:quoc_tich,idQuocTich',
            'idCoSo' => 'required|exists:co_so_luu_tru,idCoSo',
            'ngayDuKienRoiKhoi' => 'required|date',
        ];
    }
}

