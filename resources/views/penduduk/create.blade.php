@extends('layouts.app')
@section('title', 'Tambah Penduduk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Tambah Penduduk</h5>
        <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @include('partials.alert')

    <form action="{{ route('penduduk.store') }}" method="POST">
        @csrf
        @include('penduduk.partials.form', ['mode' => 'create'])
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
