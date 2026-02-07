<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Order;

Route::get('/', function () {
    $pakets = \App\Models\Paket::all();
    return view('landing', compact('pakets'));
});
Route::get('/landing', function () {
    return view('landing');
});

// Admin Authentication Routes
// Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login')->middleware('guest');
// Route::post('/admin/login', [AuthController::class, 'adminLogin'])->middleware('guest');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->middleware('auth')->name('cart.add');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('auth')->name('checkout');
        });

// Protected Routes - Admin Only
Route::middleware(['admin'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::middleware(['auth','admin'])->get('/admin/orders',[AdminOrderController::class, 'index'])->name('admin.orders');
Route::get('/admin/orders', function () {
        $orders = Order::with ('items',) ->latest()->get();
        return view('admin.orders', compact('orders'));
        })->middleware(['auth','admin']);

    // Paket routes
    Route::get('/paket', [PaketController::class, 'index'])->name('admin.paket.index');
    Route::get('/paket/tambah', [PaketController::class, 'create'])->name('admin.paket.create');
    Route::post('/paket/simpan', [PaketController::class, 'store'])->name('admin.paket.store');
    Route::get('/paket/{id}/edit', [PaketController::class, 'edit'])->name('admin.paket.edit');
    Route::patch('/paket/{id}', [PaketController::class, 'update'])->name('admin.paket.update');
    Route::delete('/paket/hapus/{id}', [PaketController::class, 'destroy'])->name('admin.paket.destroy');

    // Transaksi routes
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
    Route::get('/transaksi/tambah', [TransaksiController::class, 'create'])->name('admin.transaksi.create');
    Route::post('/transaksi/simpan', [TransaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('admin.transaksi.edit');
    Route::patch('/transaksi/{id}', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('admin.transaksi.destroy');

    // Pelanggan routes
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan.index');
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create'])->name('admin.pelanggan.create');
    Route::post('/pelanggan/simpan', [PelangganController::class, 'store'])->name('admin.pelanggan.store');
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
    Route::patch('/pelanggan/{id}', [PelangganController::class, 'update'])->name('admin.pelanggan.update');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('admin.pelanggan.destroy');

    //Order routes
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::patch('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
});