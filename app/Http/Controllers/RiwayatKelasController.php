<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKelas;
use App\Models\User;
use App\Models\Rombel;
use Illuminate\Http\Request;

class RiwayatKelasController extends Controller
{
    // Tampilkan semua riwayat kelas
    public function index()
    {
        $riwayats = RiwayatKelas::with(['user', 'rombel'])->get();
        return view('riwayat.index', compact('riwayats'));
    }

    // Form tambah riwayat
    public function create()
    {
        $users = User::all();
        $rombels = Rombel::all();
        return view('riwayat.create', compact('users', 'rombels'));
    }

    // Simpan data riwayat kelas
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rombel_id' => 'required|exists:rombel,id',
        ]);

        RiwayatKelas::create($request->all());

        return redirect()->route('riwayat.index')->with('success', 'Riwayat kelas berhasil ditambahkan.');
    }

    // Detail riwayat kelas
    public function show($id)
    {
        $riwayat = RiwayatKelas::with(['user', 'rombel'])->findOrFail($id);
        return view('riwayat.show', compact('riwayat'));
    }

    // Form edit riwayat kelas
    public function edit($id)
    {
        $riwayat = RiwayatKelas::findOrFail($id);
        $users = User::all();
        $rombels = Rombel::all();
        return view('riwayat.edit', compact('riwayat', 'users', 'rombels'));
    }

    // Update riwayat
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rombel_id' => 'required|exists:rombel,id',
        ]);

        $riwayat = RiwayatKelas::findOrFail($id);
        $riwayat->update($request->all());

        return redirect()->route('riwayat.index')->with('success', 'Riwayat kelas berhasil diperbarui.');
    }

    // Hapus riwayat
    public function destroy($id)
    {
        RiwayatKelas::destroy($id);
        return redirect()->route('riwayat.index')->with('success', 'Riwayat kelas berhasil dihapus.');
    }
}
