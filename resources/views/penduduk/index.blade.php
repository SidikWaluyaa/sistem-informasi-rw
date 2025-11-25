<x-app-layout>
    <x-slot name="header">
        <h5 class="mb-0">Data Penduduk</h5>
    </x-slot>

    {{-- Tombol atas --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Data Penduduk</h5>
        <div>
            <a href="{{ route('kk.lookup') }}" class="btn btn-outline-secondary">Gabungan KK + Anggota</a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreatePenduduk">Tambah
                Penduduk</button>
        </div>
    </div>

    {{-- Filter form --}}
    <form method="get" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="text" name="q" value="{{ $q }}" class="form-control"
                placeholder="Cari NIK / Nama">
        </div>
        <div class="col-md-3">
            <input type="text" name="no_kk" value="{{ $no_kk }}" class="form-control"
                placeholder="Filter berdasarkan No KK">
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-primary w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('penduduk.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
    </form>

    {{-- Alert --}}
    @include('partials.alert')

    {{-- Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>JK</th>
                    <th>No KK</th>
                    <th>Hubungan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $row)
                    <tr>
                        <td>{{ $row->nik }}</td>
                        <td class="fw-semibold">{{ $row->nama }}</td>
                        <td>{{ $row->tempat_lahir }},
                            {{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>
                            @if ($row->kk)
                                <div class="fw-semibold">{{ $row->kk->no_kk }}</div>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $row->hubungan_keluarga }}</td>
                        <td class="text-nowrap">
                            <div class="btn-group btn-group-sm" role="group">
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-outline-secondary btn-edit-penduduk"
                                    data-id="{{ $row->id }}" data-nik="{{ $row->nik }}"
                                    data-nama="{{ $row->nama }}" data-tempat_lahir="{{ $row->tempat_lahir }}"
                                    data-tanggal_lahir="{{ $row->tanggal_lahir }}"
                                    data-jenis_kelamin="{{ $row->jenis_kelamin }}"
                                    data-gol_darah="{{ $row->gol_darah }}" data-agama="{{ $row->agama }}"
                                    data-status_perkawinan="{{ $row->status_perkawinan }}"
                                    data-pendidikan="{{ $row->pendidikan }}" data-pekerjaan="{{ $row->pekerjaan }}"
                                    data-kewarganegaraan="{{ $row->kewarganegaraan }}"
                                    data-no_paspor="{{ $row->no_paspor }}" data-no_kitap="{{ $row->no_kitap }}"
                                    data-hubungan_keluarga="{{ $row->hubungan_keluarga }}"
                                    data-kk_id="{{ $row->kk_id }}" data-alamat_ktp="{{ $row->alamat_ktp }}"
                                    data-bs-toggle="modal" data-bs-target="#modalEditPenduduk">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('penduduk.destroy', $row->id) }}" method="post"
                                    class="d-inline" onsubmit="return confirm('Hapus penduduk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>

                                <!-- Link KK -->
                                <a href="{{ route('kk.lookup', ['no_kk' => $row->kk->no_kk]) }}"
                                    class="btn btn-outline-primary">
                                    <i class="bi bi-card-list"></i> Lihat KK
                                </a>
                            </div>
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

    @include('penduduk.partials.modal-create')


    @include('penduduk.partials.modal-edit')

    @push('scripts')
        <script>
            const editPBtns = document.querySelectorAll('.btn-edit-penduduk');
            editPBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const form = document.getElementById('formEditPenduduk');
                    form.action = `{{ url('penduduk') }}/${btn.dataset.id}`;
                    const fields = [
                        'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
                        'gol_darah', 'agama', 'status_perkawinan', 'pendidikan', 'pekerjaan',
                        'kewarganegaraan', 'no_paspor', 'no_kitap', 'hubungan_keluarga', 'kk_id',
                        'alamat_ktp'
                    ];
                    fields.forEach(name => {
                        const el = document.querySelector(`#modalEditPenduduk [name="${name}"]`);
                        if (el) {
                            el.value = btn.dataset[name] || '';
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
