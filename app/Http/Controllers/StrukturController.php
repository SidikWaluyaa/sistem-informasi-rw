<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function wargaIndex()
    {
        // Ambil semua data pengurus, diurutkan berdasarkan ID (urutan input)
        $strukturs = Struktur::orderBy('id', 'asc')->get();

        return view('warga.struktur.index', compact('strukturs'));
    }
    public function index()
    {
        $data = Struktur::all();
        return view('struktur.index', compact('data'));
    }

    public function create()
    {
        return view('struktur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('struktur', 'public');
        }

        Struktur::create([
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'foto' => $foto,
        ]);

        return redirect()->route('struktur.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $struktur = Struktur::findOrFail($id);
        return view('struktur.show', compact('struktur'));
    }

    public function edit($id)
    {
        $struktur = Struktur::findOrFail($id);
        return view('struktur.edit', compact('struktur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $struktur = Struktur::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($struktur->foto) {
                Storage::disk('public')->delete($struktur->foto);
            }

            $foto = $request->file('foto')->store('struktur', 'public');
            $struktur->foto = $foto;
        }

        $struktur->nama = $request->nama;
        $struktur->jabatan = $request->jabatan;
        $struktur->save();

        return redirect()->route('struktur.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $struktur = Struktur::findOrFail($id);

        if ($struktur->foto) {
            Storage::disk('public')->delete($struktur->foto);
        }

        $struktur->delete();

        return redirect()->route('struktur.index')->with('success', 'Data berhasil dihapus.');
    }
}
