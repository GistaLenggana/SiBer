<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    // Tampilkan semua rombel
    public function index()
    {
        $rombels = Rombel::with('tahunAjaran')->get();
        return view('rombel.index', compact('rombels'));
    }

    // Tampilkan form tambah rombel
    public function create()
    {
        $tahunAjaran = TahunAjaran::all();
        return view('rombel.create', compact('tahunAjaran'));
    }

    // Simpan rombel baru
    public function store(Request $request)
    {
        $request->validate([
            'tingkat_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'banyak_kelas' => 'required|integer|min:1',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
        ]);

        Rombel::create($request->all());

        return redirect()->route('rombel.index')->with('success', 'Rombel berhasil ditambahkan');
    }

    // Tampilkan detail rombel
    public function show($id)
    {
        $rombel = Rombel::with('tahunAjaran')->findOrFail($id);
        return view('rombel.show', compact('rombel'));
    }

    // Tampilkan form edit rombel
    public function edit($id)
    {
        $rombel = Rombel::findOrFail($id);
        $tahunAjaran = TahunAjaran::all();
        return view('rombel.edit', compact('rombel', 'tahunAjaran'));
    }

    // Update rombel
    public function update(Request $request, $id)
    {
        $request->validate([
            'tingkat_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'banyak_kelas' => 'required|integer|min:1',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
        ]);

        $rombel = Rombel::findOrFail($id);
        $rombel->update($request->all());

        return redirect()->route('rombel.index')->with('success', 'Rombel berhasil diperbarui');
    }

    // Hapus rombel
    public function destroy($id)
    {
        Rombel::destroy($id);
        return redirect()->route('rombel.index')->with('success', 'Rombel berhasil dihapus');
    }
}
