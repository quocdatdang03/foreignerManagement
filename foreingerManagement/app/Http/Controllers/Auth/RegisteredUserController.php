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
            'sdt' => ['required', 'string', 'digits:10', 'unique:nguoi_dungs,sdt'],
            'soCCCD' => ['required', 'string', 'digits:12', 'unique:nguoi_dungs,soCCCD'],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],], 
            ['hoVaTen.required' => 'Họ và tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'sdt.required' => 'Số điện thoại là bắt buộc.',
            'sdt.unique' => 'Số điện thoại này đã được sử dụng.',
            'sdt.digits' => 'Số điện thoại phải có 10 chữ số.',
            'soCCCD.required' => 'Vui lòng nhập số CCCD.',
            'soCCCD.digits' => 'Số CCCD phải có đúng 12 chữ số.',
            'soCCCD.unique' => 'Số CCCD đã được sử dụng.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải ít nhất có 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',]);

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
