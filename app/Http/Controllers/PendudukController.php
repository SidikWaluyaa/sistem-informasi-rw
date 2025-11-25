<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\KartuKeluarga; // Digunakan untuk mencari KK, jadi tetap dipertahankan.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendudukController extends Controller
{
    /**
     * Konstruktor untuk menerapkan middleware otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar Penduduk dengan fitur filter dan paginasi.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['q', 'no_kk']);

        $items = Penduduk::with('kk')
            ->filter($filters)
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        $no_kk = $filters['no_kk'] ?? '';
        $q = $filters['q'] ?? '';

        return view('penduduk.index', compact('items', 'no_kk', 'q'));
    }

    /**
     * Menampilkan formulir untuk membuat sumber daya baru.
     * (Saat ini tidak diimplementasikan, bisa dihapus jika tidak diperlukan).
     */
    public function create()
    {
        $kks = KartuKeluarga::all(); // supaya bisa pilih KK
        return view('penduduk.create', compact('kks'));
    }


    /**
     * Menyimpan sumber daya yang baru dibuat ke penyimpanan.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik'               => 'required|digits:16|unique:penduduks,nik',
            'nama'              => 'required|string|max:100',
            'tempat_lahir'      => 'required|string|max:50',
            'tanggal_lahir'     => 'required|date',
            'jenis_kelamin'     => 'required|in:L,P',
            'gol_darah'         => 'nullable|in:A,B,AB,O,-',
            'agama'             => 'required|string|max:20',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pendidikan'        => 'nullable|string|max:50',
            'pekerjaan'         => 'nullable|string|max:50',
            'kewarganegaraan'   => 'required|string|in:WNI,WNA',
            'no_paspor'         => 'nullable|string|max:20',
            'no_kitap'          => 'nullable|string|max:20',
            'hubungan_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Cucu,Orang Tua,Lainnya',
            'kk_id'             => 'required|exists:kartu_keluargas,id',
            'alamat_ktp'        => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated) {
            $penduduk = Penduduk::create($validated);

            // Sinkronisasi kepala keluarga jika penduduk yang baru ditambahkan adalah Kepala Keluarga
            if ($penduduk->hubungan_keluarga === 'Kepala Keluarga') {
                $kk = $penduduk->kk;
                $kk->kepala_keluarga = $penduduk->id;
                $kk->save();
            }
        });

        return back()->with('success', 'Penduduk berhasil ditambahkan.');
    }

    /**
     * Menampilkan sumber daya yang ditentukan.
     * (Saat ini tidak diimplementasikan, bisa dihapus jika tidak diperlukan).
     */
    public function show(string $id)
    {
        //
        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Menampilkan formulir untuk mengedit sumber daya yang ditentukan.
     * (Saat ini tidak diimplementasikan, bisa dihapus jika tidak diperlukan).
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Memperbarui sumber daya yang ditentukan di penyimpanan.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            'nik'               => 'required|digits:16|unique:penduduks,nik,' . $penduduk->id,
            'nama'              => 'required|string|max:100',
            'tempat_lahir'      => 'required|string|max:50',
            'tanggal_lahir'     => 'required|date',
            'jenis_kelamin'     => 'required|in:L,P',
            'gol_darah'         => 'nullable|in:A,B,AB,O,-',
            'agama'             => 'required|string|max:20',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pendidikan'        => 'nullable|string|max:50',
            'pekerjaan'         => 'nullable|string|max:50',
            'kewarganegaraan'   => 'required|string|in:WNI,WNA',
            'no_paspor'         => 'nullable|string|max:20',
            'no_kitap'          => 'nullable|string|max:20',
            'hubungan_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Cucu,Orang Tua,Lainnya',
            'kk_id'             => 'required|exists:kartu_keluargas,id',
            'alamat_ktp'        => 'nullable|string',
        ]);

        DB::transaction(function () use ($penduduk, $validated) {
            $oldIsKK = ($penduduk->hubungan_keluarga === 'Kepala Keluarga');
            $oldKKId = $penduduk->kk_id;

            $penduduk->update($validated);

            // Update hubungan kepala keluarga bila berubah
            $kk = $penduduk->kk()->first();

            if ($penduduk->hubungan_keluarga === 'Kepala Keluarga') {
                // Set sebagai kepala KK di KK barunya
                $kk->kepala_keluarga = $penduduk->id;
                $kk->save();
            } else if ($oldIsKK) {
                // Bila sebelumnya kepala, kosongkan penunjukan jika masih menunjuk dirinya
                // dan KK-nya tidak berubah
                $oldKk = ($oldKKId && $oldKKId === $kk->id) ? KartuKeluarga::find($oldKKId) : null;
                if ($oldKk && $oldKk->kepala_keluarga === $penduduk->id) {
                    $oldKk->kepala_keluarga = null;
                    $oldKk->save();
                }
            }
        });

        return back()->with('success', 'Penduduk berhasil diperbarui.');
    }

    /**
     * Menghapus sumber daya yang ditentukan dari penyimpanan.
     */
    public function destroy(Penduduk $penduduk)
    {
        DB::transaction(function () use ($penduduk) {
            // Jika yang dihapus adalah kepala keluarga, kosongkan pointer di KK
            $kk = $penduduk->kk;
            if ($kk && $kk->kepala_keluarga === $penduduk->id) {
                $kk->kepala_keluarga = null;
                $kk->save();
            }
            $penduduk->delete();
        });

        return back()->with('success', 'Penduduk berhasil dihapus.');
    }
}
