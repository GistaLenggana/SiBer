<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // Tampilkan semua pengaduan
    public function index()
    {
        $pengaduan = Pengaduan::with('user', 'kategori')->get();
        return view('pengaduan.index', compact('pengaduan'));
    }

    // Tampilkan form pengaduan baru
    public function create()
    {
        $kategori = Kategori::all();
        return view('pengaduan.create', compact('kategori'));
    }

    // Simpan pengaduan baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul_pengaduan' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Pengaduan::create([
            'user_id' => Auth::id(), // Ambil dari user login
            'kategori_id' => $request->kategori_id,
            'judul_pengaduan' => $request->judul_pengaduan,
            'nama_guru' => $request->nama_guru,
            'deskripsi' => $request->deskripsi,
            'status_pengaduan' => 'belum diproses',
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim');
    }

    // Tampilkan detail pengaduan
    public function show($id)
    {
        $pengaduan = Pengaduan::with('user', 'kategori')->findOrFail($id);
        return view('pengaduan.show', compact('pengaduan'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $kategori = Kategori::all();
        return view('pengaduan.edit', compact('pengaduan', 'kategori'));
    }

    // Update pengaduan
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul_pengaduan' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status_pengaduan' => 'required|string'
        ]);

        $pengaduan->update($request->all());

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui');
    }

    // Hapus pengaduan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus');
    }
}
