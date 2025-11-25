<x-app-layout>
    @section('title', 'Data Kartu Keluarga')

    {{-- Header Halaman --}}
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Kartu Keluarga</h5>
            <div>
                <a href="{{ route('kk.lookup') }}" class="btn btn-outline-secondary">
                    Gabungan KK + Anggota
                </a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateKK">
                    Tambah KK
                </button>
            </div>
        </div>
    </x-slot>

    {{-- Form Pencarian --}}
    <form method="get" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="q" value="{{ $q }}" class="form-control"
                placeholder="Cari no KK / alamat / kelurahan / kecamatan">
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-primary w-100">Cari</button>
        </div>
    </form>

    @include('partials.alert')

    {{-- Tabel KK --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No KK</th>
                    <th>Kepala Keluarga</th>
                    <th>Alamat</th>
                    <th>RT/RW</th>
                    <th>Kel/Kec</th>
                    <th>Kab/Prov</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $row)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $row->no_kk }}</div>
                            <a href="{{ route('kk.lookup', ['no_kk' => $row->no_kk]) }}" class="small">
                                Lihat anggota
                            </a>
                        </td>
                        <td>{{ optional($row->kepalaKeluarga)->nama ?? '-' }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->rt }}/{{ $row->rw }}</td>
                        <td>{{ $row->kelurahan }} / {{ $row->kecamatan }}</td>
                        <td>{{ $row->kabupaten }} / {{ $row->provinsi }}</td>
                        <td class="text-nowrap">
                            <button class="btn btn-sm btn-outline-secondary me-1 btn-edit-kk"
                                data-id="{{ $row->id }}" data-no_kk="{{ $row->no_kk }}"
                                data-alamat="{{ $row->alamat }}" data-rt="{{ $row->rt }}"
                                data-rw="{{ $row->rw }}" data-kelurahan="{{ $row->kelurahan }}"
                                data-kecamatan="{{ $row->kecamatan }}" data-kabupaten="{{ $row->kabupaten }}"
                                data-provinsi="{{ $row->provinsi }}" data-kode_pos="{{ $row->kode_pos }}"
                                data-bs-toggle="modal" data-bs-target="#modalEditKK">
                                Edit
                            </button>
                            <form action="{{ route('kartu-keluarga.destroy', $row->id) }}" method="post"
                                class="d-inline" onsubmit="return confirm('Hapus KK ini?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $items->links() }}

    <!-- Modal Create KK -->
    <div class="modal fade" id="modalCreateKK" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('kartu-keluarga.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        @include('kk.partials.form')
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit KK -->
    <div class="modal fade" id="modalEditKK" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditKK" method="post">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        @include('kk.partials.form')
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const editBtns = document.querySelectorAll('.btn-edit-kk');
            editBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const form = document.getElementById('formEditKK');
                    form.action = `{{ url('kartu-keluarga') }}/${btn.dataset.id}`;
                    const mapping = ['no_kk', 'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan',
                        'kabupaten', 'provinsi', 'kode_pos'
                    ];
                    mapping.forEach(name => {
                        const el = document.querySelector(`#modalEditKK [name="${name}"]`);
                        if (el) el.value = btn.dataset[name] || '';
                    });
                })
            });
        </script>
    @endpush
</x-app-layout>
