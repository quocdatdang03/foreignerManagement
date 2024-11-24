<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendRandomPassword;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Mail;


class GoogleAuthController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Kiểm tra xem người dùng đã tồn tại trong DB chưa
            $user = NguoiDung::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Tạo người dùng mới nếu chưa tồn tại
                $randomPassword = Str::random(10); // Tạo mật khẩu ngẫu nhiên 10 ký tự
                $user = NguoiDung::create([
                    'hoVaTen' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'matKhau' => bcrypt($randomPassword), // Lưu mật khẩu đã mã hóa
                    'idVaiTro' => 2, // Vai trò mặc định là user
                    'trangThai' => 'active', // Trạng thái mặc định
                ]);
                // Gửi mật khẩu tới email
                Mail::to($googleUser->getEmail())->send(new SendRandomPassword($randomPassword));
            }

            // Đăng nhập người dùng
            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Đăng nhập bằng Google thất bại.');
        }
    }
}
