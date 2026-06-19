<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// --- Rute Public ---
Route::get('/', function () { return view('pendaftaran'); });
Route::get('/pendaftaran', function () { return view('pendaftaran'); });
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::get('/pendaftaran-sukses', function () { 
    return view('pendaftaran_sukses'); 
})->name('pendaftaran.sukses');

Route::get('/cek-status', [PendaftaranController::class, 'cekStatus'])->name('pendaftaran.cekStatus');
Route::post('/hasil-status', [PendaftaranController::class, 'hasilStatus'])->name('pendaftaran.hasilStatus');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// --- Rute Admin ---
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/detail/{id}', [AdminController::class, 'show'])->name('admin.detail');
    Route::get('/admin/cetak-pdf/{id}', [AdminController::class, 'cetakPdf'])->name('admin.cetakPdf');
    Route::post('/admin/selesai/{id}', [AdminController::class, 'tandaiSelesai'])->name('admin.tandaiSelesai');
    
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    
    Route::get('/admin/password', [AdminController::class, 'editPassword'])->name('admin.password');
    Route::post('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
    
    Route::patch('/admin/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
    
    // Rute Hapus yang sudah benar:
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    
    Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
    Route::post('/admin/import', [AdminController::class, 'import'])->name('admin.import');
});

// PINTU DARURAT
Route::get('/login-paksa', function () {
    $user = \App\Models\User::first();
    if ($user) {
        auth()->login($user);
        return redirect('/admin');
    }
    return "User belum ada!";
});