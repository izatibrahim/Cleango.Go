<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Tampilkan daftar order
    public function index()
    {
        $transaksis = Order::with(['paket', 'user'])->latest()->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    // Tampilkan form tambah order
    public function create()
    {
        $pakets = Paket::all();
        $users  = User::all();
        return view('admin.transaksi.create', compact('pakets', 'users'));
    }

    // Simpan order baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id'      => 'nullable|exists:users,id',
            'paket_id'     => 'required|exists:tb_paket,id',
            'total'  => 'required|numeric|min:0',
            'status'       => 'required|in:pending,selesai,dibayar',
            'catatan'      => 'nullable|string',
        ]);

        Order::create($request->all());

        return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    // Tampilkan form edit order
    public function edit($id)
    {
        $transaksi  = Order::findOrFail($id);
        $pakets = Paket::all();
        $users  = User::all();

        return view('admin.transaksi.edit', compact('transaksi', 'pakets', 'users'));
    }

    // Update order
    public function update(Request $request, $id)
    {
        $transaksi = Order::findOrFail($id);

        $request->validate([
            'user_id'      => 'nullable|exists:users,id',
            'paket_id'     => 'required|exists:tb_paket,id',
            'total'  => 'required|numeric|min:0',
            'status'       => 'required|in:pending,selesai,dibayar',
            'catatan'      => 'nullable|string',
        ]);

        $transaksi->update($request->all());

        return redirect('/transaksi')->with('success', 'Transaksi berhasil diperbarui!');
    }

    // Hapus order
    public function destroy($id)
    {
        $transaksi = Order::findOrFail($id);
        $transaksi->delete();

        return redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus!');
    }
}
