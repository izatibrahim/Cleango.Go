<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung statistik dengan error handling
        try {
            $totalPaket = Paket::count();
            $totalTransaksi = Transaksi::count();
            $totalPelanggan = User::where('role', 'user')->count();
            $totalPendapatan = Transaksi::sum('total_harga') ?? 0;
        } catch (\Exception $e) {
            // Jika ada error, set nilai default
            $totalPaket = 0;
            $totalTransaksi = 0;
            $totalPelanggan = 0;
            $totalPendapatan = 0;
        }

        // Ambil aktivitas terbaru (5 transaksi terakhir)
        $recentActivities = Transaksi::with(['user', 'paket'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'totalPaket',
            'totalTransaksi',
            'totalPelanggan',
            'totalPendapatan',
            'recentActivities'
        ));
    }
}
