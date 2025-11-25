<x-app-layout>
    {{-- Slot 'header' akan menampilkan judul di bawah navbar --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Manajemen Agenda RW
        </h2>
    </x-slot>

    @php
        \Carbon\Carbon::setLocale('id');
    @endphp

    {{-- Pesan Sukses (jika ada) --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{-- Header Halaman di dalam Konten --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="h4 mb-0">Daftar Agenda</h3>
        <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary">
            <i class="bi bi-calendar-plus-fill me-2"></i>Tambah Agenda Baru
        </a>
    </div>

    {{-- Tabel Daftar Agenda --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col" style="width: 5%;">#</th>
                    <th scope="col">Judul Agenda</th>
                    <th scope="col" style="width: 25%;">Tanggal</th>
                    <th scope="col" style="width: 20%;">Lokasi</th>
                    <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agendas as $agenda)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $agenda->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</td>
                        <td>{{ $agenda->lokasi ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.agenda.show', $agenda->id) }}" class="btn btn-info btn-sm"
                                title="Lihat Detail"><i class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm"
                                title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">Belum ada agenda yang dijadwalkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
