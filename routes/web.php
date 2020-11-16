<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/register', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Data Tamu
Route::get('/tamu_isi_form', [TamuController::class, 'index']);
Route::post('/tamu_send_form', [TamuController::class, 'store']);
Route::get('/tamu_sukses_form', [TamuController::class, 'success']);

// Route Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/permintaan', [AdminController::class, 'permintaan']);
    Route::get('/permintaan/hapus/{id}', [AdminController::class, 'permintaan_hapus']);
    Route::get('/permintaan/{id}', [AdminController::class, 'permintaan_show']);
    Route::get('/export_permintaan_excel_all', [AdminController::class, 'export_excel_all']);
    Route::get('/export_permintaan_excel_date', [AdminController::class, 'export_excel_date']);
    Route::get('/cetak_permintaan_pdf', [AdminController::class, 'cetak_pdf']);
    Route::get('/pengaturan', [AdminController::class, 'setting']);
    Route::get('/pengaturan/{id}', [AdminController::class, 'setting_get']);
    Route::put('/pengaturan/update/{id}', [AdminController::class, 'setting_update']);
});
