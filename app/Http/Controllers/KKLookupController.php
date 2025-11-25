<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class KKLookupController extends Controller
{
    /**
     * Konstruktor untuk menerapkan middleware otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman pencarian Kartu Keluarga dan detailnya.
     * Halaman ini akan mencari Kartu Keluarga berdasarkan nomor KK yang diberikan
     * dan menampilkan informasi KK beserta daftar anggotanya.
     */
    public function index(Request $request)
    {
        $no_kk = $request->input('no_kk');
        $kk = null; // Inisialisasi variabel $kk

        if ($no_kk) {
            $kk = KartuKeluarga::with([
                'kepalaKeluarga',
                'anggota' => function ($query) {
                    $query->orderBy('hubungan_keluarga');
                }
            ])->where('no_kk', $no_kk)->first();
        }

        return view('kk_penduduk.index', compact('no_kk', 'kk'));
    }
}
