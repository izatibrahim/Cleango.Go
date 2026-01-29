<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Tampilkan daftar transaksi
    public function index()
    {
        $transaksis = Transaksi::with(['paket', 'user'])->latest()->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    // Tampilkan form tambah transaksi
    public function create()
    {
        $pakets = Paket::all();
        $users = User::all();
        return view('admin.transaksi.create', compact('pakets', 'users'));
    }

    // Simpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'paket_id' => 'required|exists:tb_paket,id',
            'no_transaksi' => 'required|unique:transaksi',
            'total_harga' => 'required|numeric|min:0',
            'status' => 'required|in:pending,selesai,dibayar',
            'catatan' => 'nullable|string',
        ]);

        Transaksi::create($request->all());

        return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    // Tampilkan form edit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pakets = Paket::all();
        $users = User::all();
        return view('admin.transaksi.edit', compact('transaksi', 'pakets', 'users'));
    }

    // Update transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'paket_id' => 'required|exists:tb_paket,id',
            'no_transaksi' => 'required|unique:transaksi,no_transaksi,' . $id,
            'total_harga' => 'required|numeric|min:0',
            'status' => 'required|in:pending,selesai,dibayar',
            'catatan' => 'nullable|string',
        ]);

        $transaksi->update($request->all());

        return redirect('/transaksi')->with('success', 'Transaksi berhasil diperbarui!');
    }

    // Hapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus!');
    }
}
