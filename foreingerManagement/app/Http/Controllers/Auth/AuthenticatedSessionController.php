<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // Xác thực đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $credentials = $request->only('email', 'password');

        // Lấy thông tin người dùng
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // Nếu không tìm thấy người dùng hoặc mật khẩu không đúng
        if (!$user || !Auth::getProvider()->validateCredentials($user, $credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Tài khoản hoặc mật khẩu không đúng.',
            ]);
        }

        // Kiểm tra trạng thái tài khoản
        if ($user->trangThai !== 'active') {
            throw ValidationException::withMessages([
                'email' => 'Tài khoản của bạn chưa được kích hoạt hoặc đã bị khóa.',
            ]);
        }

        // Đăng nhập người dùng
        Auth::login($user);
        $request->session()->regenerate();

        // Chuyển hướng dựa trên vai trò
        if ($user->idVaiTro === 1) {
            return redirect()->route('user.home')->with('user', $user);
        } elseif ($user->idVaiTro === 2) {
            return redirect()->route('admin.home')->with('user', $user);
        }

        // Mặc định chuyển đến dashboard nếu không xác định được vai trò
        return redirect()->intended('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Chuyển hướng về trang đăng nhập
        return redirect()->route('login');
    }
}
