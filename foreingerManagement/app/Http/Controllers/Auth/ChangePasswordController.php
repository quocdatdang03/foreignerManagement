<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Hiển thị form đổi mật khẩu.
     */
    public function index()
    {
        return view('user.change-password');
    }

    /**
     * Xử lý yêu cầu đổi mật khẩu.
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->matKhau)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        // Kiểm tra nếu mật khẩu mới trùng với mật khẩu hiện tại
        if (Hash::check($request->new_password, $user->matKhau)) {
            return back()->withErrors(['new_password' => 'Mật khẩu mới không được trùng với mật khẩu hiện tại.']);
        }

        // Cập nhật mật khẩu mới
        $user->matKhau = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
