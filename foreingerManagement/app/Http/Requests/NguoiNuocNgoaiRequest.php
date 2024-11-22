<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiNuocNgoaiRequest extends FormRequest
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
            'idQuocTich' => 'required|exists:quoc_tichs,idQuocTich',
            'idCoSo' => 'required|exists:co_so_luu_trus,idCoSo',
            'ngayDuKienRoiKhoi' => 'required|date|after_or_equal:ngayDen',
        ];
    }

    public function messages()
    {
        return [
            'hoTen.required' => 'Họ tên không được để trống.',
            'soPassport.required' => 'Số passport không được để trống.',
            'sdt.required' => 'Số điện thoại không được để trống.',
            'sdt.max' => 'Số điện thoại không được vượt quá 10 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'ngaySinh.required' => 'Ngày sinh không được để trống.',
            'ngayDen.required' => 'Ngày đến không được để trống.',
            'lyDoDen.required' => 'Lý do đến không được để trống.',
            'idQuocTich.required' => 'Quốc tịch không được để trống.',
            'idQuocTich.exists' => 'Quốc tịch không tồn tại trong hệ thống.',
            'idCoSo.required' => 'Cơ sở lưu trú không được để trống.',
            'idCoSo.exists' => 'Cơ sở lưu trú không tồn tại trong hệ thống.',
            'ngayDuKienRoiKhoi.required' => 'Ngày dự kiến rời khỏi không được để trống.',
            'ngayDuKienRoiKhoi.date' => 'Ngày dự kiến rời khỏi phải là định dạng ngày.',
            'ngayDuKienRoiKhoi.after_or_equal' => 'Ngày dự kiến rời khỏi phải sau hoặc bằng ngày đến.',
        ];
    }

    
}

