<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('landing');
});
Route::get('/landing', function () {
    return view('landing');
});

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->middleware('guest');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('admin');

// Protected Routes - Admin Only
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // Paket routes
    Route::get('/paket', [PaketController::class, 'index']);
    Route::get('/paket/tambah', [PaketController::class, 'create']);
    Route::post('/paket/simpan', [PaketController::class, 'store']);
    Route::get('/paket/{id}/edit', [PaketController::class, 'edit']);
    Route::patch('/paket/{id}', [PaketController::class, 'update']);
    Route::delete('/paket/hapus/{id}', [PaketController::class, 'destroy']);

    // Transaksi routes
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/tambah', [TransaksiController::class, 'create']);
    Route::post('/transaksi/simpan', [TransaksiController::class, 'store']);
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit']);
    Route::patch('/transaksi/{id}', [TransaksiController::class, 'update']);
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);

    // Pelanggan routes
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create']);
    Route::post('/pelanggan/simpan', [PelangganController::class, 'store']);
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit']);
    Route::patch('/pelanggan/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);
});