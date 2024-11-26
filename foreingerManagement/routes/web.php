<?php

use App\Http\Controllers\CoSoLuuTrusController;
use App\Http\Controllers\NguoiNuocNgoaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiayPhepController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\ThongKeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('cosoluutrus', CoSoLuuTrusController::class);
Route::put('/cosoluutrus/{cosoluutru}', [CoSoLuuTrusController::class, 'update']);
Route::get('/cosoluutrus/create', [CoSoLuuTrusController::class, 'create'])->name('cosoluutrus.create');
Route::post('/cosoluutrus', [CoSoLuuTrusController::class, 'store'])->name('cosoluutrus.store');
Route::get('/cosoluutrus/search', [CoSoLuuTrusController::class, 'search'])->name('cosoluutrus.search');

Route::get('/search-nguoi-dung', [NguoiDungController::class, 'search']);
Route::get('/get-quanhuyen/{tinhThanhId}', [LocationController::class, 'getQuanHuyen']);
Route::get('/get-phuongxa/{quanHuyenId}', [LocationController::class, 'getPhuongXa']);

Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index');
Route::get('/giayphep/chart/data', [ThongKeController::class, 'getGiayPhepData'])->name('giayphep.chart.ajax');

