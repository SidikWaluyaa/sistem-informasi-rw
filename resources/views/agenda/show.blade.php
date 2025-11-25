<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Agenda: {{ \Illuminate\Support\Str::limit($agenda->judul, 30) }}
        </h2>
    </x-slot>

    <article>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2 class="display-6 mb-0">{{ $agenda->judul }}</h2>
                <p class="lead text-muted">
                    <i class="bi bi-calendar-event"></i>
                    {{ \Carbon\Carbon::parse($agenda->tanggal)->isoFormat('dddd, D MMMM YYYY') }}
                    <span class="mx-2">|</span>
                    <i class="bi bi-geo-alt-fill"></i> {{ $agenda->lokasi ?? 'Lokasi belum ditentukan' }}
                </p>
            </div>
            <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
        <hr>
        <h4 class="mb-3">Deskripsi Agenda</h4>
        <div class="fs-5" style="white-space: pre-wrap;">
            {{ $agenda->deskripsi ?? 'Tidak ada deskripsi.' }}
        </div>
        <hr class="my-4">
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-warning"><i
                    class="bi bi-pencil-square me-2"></i>Edit</a>
            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill me-2"></i>Hapus</button>
            </form>
        </div>
    </article>
</x-app-layout>
