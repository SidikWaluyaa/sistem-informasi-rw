<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function wargaShow()
    {
        // Ambil data profil pertama, atau gagalkan jika tidak ada sama sekali
        $profil = Profil::firstOrFail();

        return view('warga.profil.show', compact('profil'));
    }

    /**
     * Menampilkan halaman utama profil.
     * Jika tidak ada profil, akan menampilkan halaman create.
     */
    public function index()
    {
        // Selalu ambil data pertama, karena profil RW hanya ada satu.
        $profil = Profil::first();

        // Jika tidak ada profil sama sekali di database,
        // arahkan pengguna untuk membuatnya terlebih dahulu.
        if (!$profil) {
            return view('profil.create');
        }

        // Jika ada, tampilkan halaman profil.
        return view('profil.index', compact('profil'));
    }

    /**
     * Menyimpan profil yang baru dibuat.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_rw' => 'required|string|max:255',
            'ketua_rw' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Proses upload logo jika ada
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('profil', 'public');
        }

        Profil::create($validatedData);

        return redirect()->route('profil.index')->with('success', 'Profil RW berhasil dibuat.');
    }

    /**
     * Menampilkan form untuk mengedit profil.
     */
    public function edit()
    {
        // Cari profil yang ada, jika tidak ada, redirect untuk membuat baru
        $profil = Profil::firstOrFail(); // firstOrFail akan error 404 jika tidak ada
        return view('profil.edit', compact('profil'));
    }

    /**
     * Memperbarui data profil yang ada.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rw' => 'required|string|max:255',
            'ketua_rw' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil = Profil::firstOrFail();

        // Proses upload logo baru jika ada
        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }
            // Simpan logo baru
            $validatedData['logo'] = $request->file('logo')->store('profil', 'public');
        }

        $profil->update($validatedData);

        return redirect()->route('admin.profil.index')->with('success', 'Profil RW berhasil diperbarui.');
    }
}
