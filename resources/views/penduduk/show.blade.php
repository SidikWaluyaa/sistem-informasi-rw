@extends('layouts.app')
@section('title', 'Detail Penduduk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Detail Penduduk</h5>
        <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>NIK</th>
                    <td>{{ $penduduk->nik }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $penduduk->nama }}</td>
                </tr>
                <tr>
                    <th>Tempat / Tgl Lahir</th>
                    <td>{{ $penduduk->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <th>Golongan Darah</th>
                    <td>{{ $penduduk->gol_darah ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ $penduduk->agama }}</td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>{{ $penduduk->status_perkawinan }}</td>
                </tr>
                <tr>
                    <th>Pendidikan</th>
                    <td>{{ $penduduk->pendidikan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $penduduk->pekerjaan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kewarganegaraan</th>
                    <td>{{ $penduduk->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <th>Hubungan Keluarga</th>
                    <td>{{ $penduduk->hubungan_keluarga }}</td>
                </tr>
                <tr>
                    <th>Alamat KTP</th>
                    <td>{{ $penduduk->alamat_ktp ?? '-' }}</td>
                </tr>
                <tr>
                    <th>No KK</th>
                    <td>{{ $penduduk->kk->no_kk ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
