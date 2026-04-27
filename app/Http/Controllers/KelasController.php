<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelasList = Kelas::latest()->get();
        return view('dashboard.kelas-saya', compact('kelasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'     => 'required|string|max:100',
            'mata_pelajaran' => 'required|string|max:100',
            'kode_kelas'     => 'required|string|max:20|unique:kelas,kode_kelas',
            'deskripsi'      => 'nullable|string',
            'kapasitas'      => 'required|integer|min:1|max:100',
            'status'         => 'required|in:aktif,draf,selesai',
        ]);

        Kelas::create($request->all());

        return redirect()->route('dashboard.kelas')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return response()->json($kelas);
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas'     => 'required|string|max:100',
            'mata_pelajaran' => 'required|string|max:100',
            'kode_kelas'     => 'required|string|max:20|unique:kelas,kode_kelas,' . $id,
            'deskripsi'      => 'nullable|string',
            'kapasitas'      => 'required|integer|min:1|max:100',
            'status'         => 'required|in:aktif,draf,selesai',
        ]);

        $kelas->update($request->all());

        return redirect()->route('dashboard.kelas')->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('dashboard.kelas')->with('success', 'Kelas berhasil dihapus!');
    }
}