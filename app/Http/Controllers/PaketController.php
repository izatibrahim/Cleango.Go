<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel tb_paket
        $pakets = Paket::all(); 
        // Kirim data ke file view paket_index.blade.php
        return view('admin.kelola paket.paket_index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.kelola paket.paket_create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'jenis' => 'required',
        ]);

        // Simpan ke database (pastikan nama kolom sesuai tb_paket kamu)
        \App\Models\Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
        ]);

        return redirect('/paket')->with('success', 'Paket berhasil ditambahkan!');
    }

    // Tampilkan form edit paket
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        $pakets = Paket::all();
        return view('admin.kelola paket.paket_index', compact('paket', 'pakets'));
    }

    // Update paket
    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);

        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'jenis' => 'required',
        ]);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
        ]);

        return redirect('/paket')->with('success', 'Paket berhasil diperbarui!');
    }

    // Fungsi untuk menghapus data
    public function destroy($id)
    {
            $paket = Paket::findOrFail($id);
            $paket->delete();

            return redirect('/paket')->with('success', 'Paket berhasil dihapus!');
    }
}