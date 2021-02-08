<?php

use App\Http\Controllers\{BarangController, HomeController, PesananController};
use Illuminate\Support\Facades\{Auth, Route};

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

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PesananController::class, 'index'])->name('data.pesanan');
Route::post('/', [PesananController::class, 'store'])->name('data.beli');


// Route::prefix('/')->group(function () {
//     Route::get('barang', [PesananController::class, 'index'])->name('data.pesanan');
// });

Route::middleware('auth')->group(function () {
    Route::prefix('data-barang')->group(function () {
        Route::get('barang', [BarangController::class, 'index'])->name('data.barang');
        Route::get('tambah', [BarangController::class, 'create'])->name('tambah.barang');
        Route::post('tambah', [BarangController::class, 'store']);
        Route::get('{barang:slug}/ubah', [BarangController::class, 'edit'])->name('ubah.barang');
        Route::put('{barang:slug}/ubah', [BarangController::class, 'update']);
        Route::delete('{barang:slug}/hapus', [BarangController::class, 'destroy'])->name('hapus.barang');
    });
    Route::get('pesanan', [PesananController::class, 'show'])->name('pesanan');
});
