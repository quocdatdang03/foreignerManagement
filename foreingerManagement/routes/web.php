<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nguoinuocngoais', [NguoiNuocNgoaiController::class, 'index'])->name('nguoinuocngoais.index');
Route::get('nguoinuocngoais/create', [NguoiNuocNgoaiController::class, 'create'])->name('nguoinuocngoais.create');
Route::post('nguoinuocngoais/store', [NguoiNuocNgoaiController::class, 'store'])->name('nguoinuocngoais.store');
Route::get('/nguoinuocngoais/edit/{nguoinuocngoai}', [NguoiNuocNgoaiController::class, 'edit'])->name('nguoinuocngoais.edit');
Route::put('/nguoinuocngoais/{nguoinuocngoai}', [NguoiNuocNgoaiController::class, 'update'])->name('nguoinuocngoais.update');



Route::get('/giaypheps', [GiayPhepController::class, 'index'])->name('giaypheps.index');
Route::get('/giaypheps/edit/{giayphep}', [GiayPhepController::class, 'edit'])->name('giaypheps.edit');
Route::put('/giaypheps/{giayphep}', [GiayPhepController::class, 'update'])->name('giaypheps.update');
Route::delete('/giaypheps/{giayphep}', [GiayPhepController::class, 'destroy'])->name('giaypheps.destroy');

// for NhanVienQuanLy
Route::get('/giaypheps/xet_duyet', [GiayPhepController::class, 'index_xetduyet'])->name('giaypheps.index.xet_duyet');
Route::get('/giaypheps/xet_duyet/edit/{giayphep}', [GiayPhepController::class, 'edit_xetduyet'])->name('giaypheps.edit.xet_duyet');
Route::put('/giaypheps/approve/{giayphep}', [GiayPhepController::class, 'approve'])->name('giaypheps.approve');
Route::put('/giaypheps/reject/{giayphep}', [GiayPhepController::class, 'reject'])->name('giaypheps.reject');
