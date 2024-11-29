<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\UpdateUserInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\User\SearchCoSoLuuTruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\GiayPhepController;
use App\Http\Controllers\CoSoLuuTrusController;
use App\Http\Controllers\NguoiNuocNgoaiController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\ThongKeController;

Route::get('/', function () {
    return view('user.userhome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('cosoluutrus', CoSoLuuTrusController::class)->middleware('role:2');
    Route::put('/cosoluutrus/{cosoluutru}', [CoSoLuuTrusController::class, 'update'])->middleware('role:2');
    Route::get('/cosoluutrus/create', [CoSoLuuTrusController::class, 'create'])->name('cosoluutrus.create')->middleware('role:2');
    Route::post('/cosoluutrus', [CoSoLuuTrusController::class, 'store'])->name('cosoluutrus.store')->middleware('role:2');
    Route::get('/cosoluutrus/search', [CoSoLuuTrusController::class, 'search'])->name('cosoluutrus.search')->middleware('role:2');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/search-nguoi-dung', [NguoiDungController::class, 'search'])->middleware('role:2');
    Route::get('/get-quanhuyen/{tinhThanhId}', [LocationController::class, 'getQuanHuyen'])->middleware('role:2');
    Route::get('/get-phuongxa/{quanHuyenId}', [LocationController::class, 'getPhuongXa'])->middleware('role:2');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index')->middleware('role:2');
    Route::get('/giayphep/chart/data', [ThongKeController::class, 'getGiayPhepData'])->name('giayphep.chart.ajax')->middleware('role:2');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/nguoinuocngoais', [NguoiNuocNgoaiController::class, 'index'])->name('nguoinuocngoais.index');
    Route::get('nguoinuocngoais/create', [NguoiNuocNgoaiController::class, 'create'])->name('nguoinuocngoais.create');
    Route::post('nguoinuocngoais/store', [NguoiNuocNgoaiController::class, 'store'])->name('nguoinuocngoais.store');
    Route::get('/nguoinuocngoais/edit/{nguoinuocngoai}', [NguoiNuocNgoaiController::class, 'edit'])->name('nguoinuocngoais.edit');
    Route::put('/nguoinuocngoais/{nguoinuocngoai}', [NguoiNuocNgoaiController::class, 'update'])->name('nguoinuocngoais.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/giaypheps', [GiayPhepController::class, 'index'])->name('giaypheps.index')->middleware('role:2');
    Route::get('/giaypheps/edit/{giayphep}', [GiayPhepController::class, 'edit'])->name('giaypheps.edit')->middleware('role:2');
    Route::put('/giaypheps/{giayphep}', [GiayPhepController::class, 'update'])->name('giaypheps.update')->middleware('role:2');
    Route::delete('/giaypheps/{giayphep}', [GiayPhepController::class, 'destroy'])->name('giaypheps.destroy')->middleware('role:2');
});

// for NhanVienQuanLy
Route::middleware(['auth'])->group(function () {
    Route::get('/giaypheps/xet_duyet', [GiayPhepController::class, 'index_xetduyet'])->name('giaypheps.index.xet_duyet')->middleware('role:2');
    Route::get('/giaypheps/xet_duyet/edit/{giayphep}', [GiayPhepController::class, 'edit_xetduyet'])->name('giaypheps.edit.xet_duyet')->middleware('role:2');
    Route::put('/giaypheps/approve/{giayphep}', [GiayPhepController::class, 'approve'])->name('giaypheps.approve')->middleware('role:2');
    Route::put('/giaypheps/reject/{giayphep}', [GiayPhepController::class, 'reject'])->name('giaypheps.reject')->middleware('role:2');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Trang userhome
    Route::get('/userhome', function () {
        return view('user.userhome');
    })->name('user.home')->middleware('role:1'); // idVaiTro = 1 cho User

    // Trang adminhome
    Route::get('/adminhome', function () {
        return view('admin.adminhome');
    })->name('admin.home')->middleware('role:2'); // idVaiTro = 2 cho Admin

    Route::middleware(['auth'])->group(function () {
        Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('password.change');
        Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('password.update');
    });

    Route::get('/user/update-info', [UpdateUserInfoController::class, 'index'])->name('user.update-info');
    Route::post('/user/update-info', [UpdateUserInfoController::class, 'update'])->name('user.update-info.update');
});

Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});
Route::get('/verify-email/{id}/{hash}', [RegisteredUserController::class, 'verify'])
    ->name('verification.verify')
    ->middleware(['signed']);
Route::post('/search-accommodation', [SearchCoSoLuuTruController::class, 'search'])->name('accommodation.search.submit');

Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
require __DIR__.'/auth.php';
