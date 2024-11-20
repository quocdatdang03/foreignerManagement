<?php

use App\Http\Controllers\NguoiNuocNgoaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiayPhepController;

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

// Các route liên quan đến NguoiNuocNgoaiController
Route::get('/nguoinuocngoais', [NguoiNuocNgoaiController::class, 'index'])->name('nguoinuocngoais.index');
Route::get('nguoinuocngoais/create', [NguoiNuocNgoaiController::class, 'create'])->name('nguoinuocngoais.create');
Route::post('nguoinuocngoais/store', [NguoiNuocNgoaiController::class, 'store'])->name('nguoinuocngoais.store');
Route::get('/nguoinuocngoais/edit/{nguoinuocngoai}', [NguoiNuocNgoaiController::class, 'edit'])->name('nguoinuocngoais.edit');
Route::put('/nguoinuocngoais/{nguoinuocngoai}', [NguoiNuocNgoaiController::class, 'update'])->name('nguoinuocngoais.update');

// Các route liên quan đến GiayPhepController
Route::get('/giaypheps', [GiayPhepController::class, 'index'])->name('giaypheps.index');
Route::get('/giaypheps/edit/{giayphep}', [GiayPhepController::class, 'edit'])->name('giaypheps.edit');
Route::put('/giaypheps/{giayphep}', [GiayPhepController::class, 'update'])->name('giaypheps.update');
Route::delete('/giaypheps/{giayphep}', [GiayPhepController::class, 'destroy'])->name('giaypheps.destroy');

// Các route liên quan đến Auth và HomeController
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


