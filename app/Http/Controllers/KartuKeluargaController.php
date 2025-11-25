<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** INDEX: daftar KK */
    public function index(Request $request)
    {
        $q = $request->input('q');

        $items = KartuKeluarga::with('kepalaKeluarga')
            ->search($q)
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('kk.index', compact('items', 'q'));
    }

    /** STORE: simpan KK baru */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk'     => 'required|digits:16|unique:kartu_keluargas,no_kk',
            'alamat'    => 'required|string',
            'rt'        => 'required|string|max:3',
            'rw'        => 'required|string|max:3',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi'  => 'required|string|max:100',
            'kode_pos'  => 'nullable|string|max:10',
        ]);

        KartuKeluarga::create($validated);

        return back()->with('success', 'Kartu Keluarga berhasil ditambahkan.');
    }

    /** SHOW: tampil detail 1 KK + anggota */
    public function show(KartuKeluarga $kartu_keluarga)
    {
        $kartu_keluarga->load(['kepalaKeluarga', 'anggota']);
        return view('kk.show', ['kk' => $kartu_keluarga]);
    }

    /** UPDATE: perbarui KK */
    public function update(Request $request, KartuKeluarga $kartu_keluarga)
    {
        $validated = $request->validate([
            'no_kk'     => 'required|digits:16|unique:kartu_keluargas,no_kk,' . $kartu_keluarga->id,
            'alamat'    => 'required|string',
            'rt'        => 'required|string|max:3',
            'rw'        => 'required|string|max:3',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi'  => 'required|string|max:100',
            'kode_pos'  => 'nullable|string|max:10',
        ]);

        $kartu_keluarga->update($validated);

        return back()->with('success', 'Kartu Keluarga berhasil diperbarui.');
    }

    /** DESTROY: hapus KK */
    public function destroy(KartuKeluarga $kartu_keluarga)
    {
        if ($kartu_keluarga->anggota()->exists()) {
            return back()->with('error', 'Tidak dapat menghapus: KK masih memiliki anggota.');
        }

        $kartu_keluarga->delete();

        return back()->with('success', 'Kartu Keluarga berhasil dihapus.');
    }

    /** LOOKUP: cari KK berdasarkan no_kk (untuk menu Gabungan) */
    public function lookup(Request $request)
    {
        $no_kk = $request->input('no_kk');
        $kk = null;

        if ($no_kk) {
            $kk = KartuKeluarga::with(['kepalaKeluarga', 'anggota'])
                ->where('no_kk', $no_kk)
                ->first();
        }

        return view('kk.lookup', compact('no_kk', 'kk'));
    }
}
