<x-app-layout>
    @section('title', 'Gabungan KK + Anggota')

    {{-- Header Halaman --}}
    <x-slot name="header">
        <h5 class="mb-0">Gabungan: Cari KK &amp; Tampilkan Anggota</h5>
    </x-slot>

    {{-- Form Pencarian KK --}}
    <form method="get" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="no_kk" value="{{ $no_kk }}" class="form-control"
                placeholder="Masukkan No KK (16 digit)">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Tampilkan</button>
        </div>
    </form>

    @include('partials.alert')

    {{-- Jika tidak ada KK --}}
    @if ($no_kk && !$kk)
        <div class="alert alert-warning">
            No KK <strong>{{ $no_kk }}</strong> tidak ditemukan.
        </div>
    @endif

    {{-- Jika KK ditemukan --}}
    @if ($kk)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="fw-bold">No KK: {{ $kk->no_kk }}</div>
                        <div>Alamat: {{ $kk->alamat }}, RT {{ $kk->rt }} / RW {{ $kk->rw }}</div>
                        <div>{{ $kk->kelurahan }}, {{ $kk->kecamatan }}, {{ $kk->kabupaten }},
                            {{ $kk->provinsi }} {{ $kk->kode_pos }}</div>
                    </div>
                    <div class="text-end">
                        <div>Kepala Keluarga:</div>
                        <div class="fw-bold">{{ optional($kk->kepalaKeluarga)->nama ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Anggota --}}
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="mb-0">Anggota Keluarga</h6>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddAnggota">
                Tambah Anggota
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>JK</th>
                        <th>Hubungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kk->anggota as $a)
                        <tr>
                            <td>{{ $a->nik }}</td>
                            <td class="fw-semibold">{{ $a->nama }}</td>
                            <td>{{ $a->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($a->tanggal_lahir)->format('d-m-Y') }}
                            </td>
                            <td>{{ $a->jenis_kelamin }}</td>
                            <td>{{ $a->hubungan_keluarga }}</td>
                            <td class="text-nowrap">
                                <form action="{{ route('penduduk.destroy', $a->id) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Hapus anggota ini?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada anggota.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modal Tambah Anggota --}}
        <div class="modal fade" id="modalAddAnggota" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Anggota KK</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('penduduk.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            @php($listKK = collect([['id' => $kk->id, 'no_kk' => $kk->no_kk]]))
                            @include('penduduk.partials.form', ['mode' => 'create'])
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
