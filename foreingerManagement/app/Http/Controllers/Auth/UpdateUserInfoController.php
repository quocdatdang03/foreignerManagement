<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserInfoController extends Controller
{
    /**
     * Hiển thị form cập nhật thông tin.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.update-info', compact('user'));
    }

    /**
     * Cập nhật thông tin người dùng.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'hoVaTen' => 'required|string|max:255',
            'sdt' => 'required|digits:10|unique:nguoi_dungs,sdt,' . $user->idNguoiDung . ',idNguoiDung',
            'soCCCD' => 'required|string|size:12|unique:nguoi_dungs,soCCCD,' . $user->idNguoiDung . ',idNguoiDung',
        ], [
            'hoVaTen.required' => 'Vui lòng nhập họ và tên.',
            'sdt.required' => 'Vui lòng nhập số điện thoại.',
            'sdt.digits' => 'Số điện thoại phải có 10 chữ số.',
            'sdt.unique' => 'Số điện thoại đã được sử dụng.',
            'soCCCD.required' => 'Vui lòng nhập số CCCD.',
            'soCCCD.size' => 'Số CCCD phải có đúng 12 ký tự.',
            'soCCCD.unique' => 'Số CCCD đã được sử dụng.',
        ]);

        // Cập nhật thông tin chỉ những trường được phép
        $user->update([
            'hoVaTen' => $request->hoVaTen,
            'sdt' => $request->sdt,
            'soCCCD' => $request->soCCCD,
        ]);

        return back()->with('success', 'Thông tin đã được cập nhật thành công.');
    }
}
