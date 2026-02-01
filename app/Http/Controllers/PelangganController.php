<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Tampilkan daftar pelanggan
    public function index()
    {
        $pelanggans = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    // Tampilkan form tambah pelanggan
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    // Simpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'password' => bcrypt('password'), // Default password
        ]);

        return redirect('/pelanggan')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    // Tampilkan form edit pelanggan
    public function edit($id)
    {
        $pelanggan = User::findOrFail($id);
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    // Update pelanggan
    public function update(Request $request, $id)
    {
        $pelanggan = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $id,
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
        ]);

        $pelanggan->update($request->all());

        return redirect('/pelanggan')->with('success', 'Pelanggan berhasil diperbarui!');
    }

    // Hapus pelanggan
    public function destroy($id)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
