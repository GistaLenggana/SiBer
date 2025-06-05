<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    // Menampilkan semua tahun ajaran
    public function index()
    {
        $tahunAjaran = TahunAjaran::all();
        return view('tahun_ajaran.index', compact('tahunAjaran'));
    }

    // Form tambah tahun ajaran
    public function create()
    {
        return view('tahun_ajaran.create');
    }

    // Simpan tahun ajaran baru
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string|max:255|unique:tahun_ajaran,tahun',
            'is_aktif' => 'nullable|boolean',
        ]);

        // Jika is_aktif = true, ubah yang lain jadi false
        if ($request->is_aktif) {
            TahunAjaran::where('is_aktif', true)->update(['is_aktif' => false]);
        }

        TahunAjaran::create([
            'tahun' => $request->tahun,
            'is_aktif' => $request->is_aktif ? true : false,
        ]);

        return redirect()->route('tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil ditambahkan');
    }

    // Tampilkan detail
    public function show($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        return view('tahun_ajaran.show', compact('tahunAjaran'));
    }

    // Form edit
    public function edit($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        return view('tahun_ajaran.edit', compact('tahunAjaran'));
    }

    // Update tahun ajaran
    public function update(Request $request, $id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);

        $request->validate([
            'tahun' => 'required|string|max:255|unique:tahun_ajaran,tahun,' . $id,
            'is_aktif' => 'nullable|boolean',
        ]);

        if ($request->is_aktif) {
            TahunAjaran::where('is_aktif', true)->where('id', '!=', $id)->update(['is_aktif' => false]);
        }

        $tahunAjaran->update([
            'tahun' => $request->tahun,
            'is_aktif' => $request->is_aktif ? true : false,
        ]);

        return redirect()->route('tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil diperbarui');
    }

    // Hapus
    public function destroy($id)
    {
        TahunAjaran::destroy($id);
        return redirect()->route('tahun-ajaran.index')->with('success', 'Tahun ajaran berhasil dihapus');
    }
}
