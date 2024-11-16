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

Route::get('/hello', function () {
    return view('welcome');
});


Route::get('nguoi-nuoc-ngoai/create', [NguoiNuocNgoaiController::class, 'create'])->name('nguoinuocngoai.create');
Route::post('nguoi-nuoc-ngoai/store', [NguoiNuocNgoaiController::class, 'store'])->name('nguoinuocngoai.store');




Route::get('/giaypheps', [GiayPhepController::class, 'index'])->name('giaypheps.index');
Route::get('/giaypheps/edit/{giayphep}', [GiayPhepController::class, 'edit'])->name('giaypheps.edit');
Route::put('/giaypheps/{giayphep}', [GiayPhepController::class, 'update'])->name('giaypheps.update');
