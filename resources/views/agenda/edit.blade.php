<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Agenda
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="alert alert-danger">
                <h5 class="alert-heading">Terjadi Kesalahan Validasi!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Agenda <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="judul" name="judul"
                value="{{ old('judul', $agenda->judul) }}" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($agenda->tanggal)->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi"
                    value="{{ old('lokasi', $agenda->lokasi) }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary me-2">Batal</a>
            <button type="submit" class="btn btn-primary">Update Agenda</button>
        </div>
    </form>
</x-app-layout>
