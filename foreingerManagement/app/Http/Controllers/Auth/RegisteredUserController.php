<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyRegistrationMail;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Hiển thị form đăng ký.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Xử lý đăng ký người dùng.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hoVaTen' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoi_dungs,email'],
            'sdt' => ['required', 'string', 'max:10', 'unique:nguoi_dungs,sdt'],
            'soCCCD' => ['required', 'string', 'max:14', 'unique:nguoi_dungs,soCCCD'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = NguoiDung::create([
            'hoVaTen' => $request->hoVaTen,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'soCCCD' => $request->soCCCD,
            'matKhau' => Hash::make($request->password),
            'idVaiTro' => 1,
            'trangThai' => 'inactive',
        ]);

        // Tạo URL xác nhận email
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // Tên route
            now()->addMinutes(60), // Thời gian hết hạn
            [
                'id' => $user->id, // ID của người dùng
                'hash' => sha1($user->email), // Tạo hash từ email
            ]
        );

        // Gửi email xác nhận
        Mail::to($user->email)->send(new VerifyRegistrationMail($verificationUrl));

        return redirect()->route('login')->with('status', 'Liên kết xác nhận đã được gửi đến email của bạn.');
    }

    /**
     * Xử lý xác minh email từ URL.
     */
    public function verify(Request $request, $id)
    {
        $user = NguoiDung::findOrFail($id);

        // Kiểm tra chữ ký hợp lệ
        if (!$request->hasValidSignature()) {
            abort(403, 'Liên kết không hợp lệ hoặc đã hết hạn.');
        }

        // Cập nhật trạng thái xác minh email
        $user->update([
            'email_verified_at' => now(),
            'trangThai' => 'active',
        ]);

        return redirect()->route('login')->with('status', 'Tài khoản của bạn đã được xác nhận. Vui lòng đăng nhập.');
    }
}
