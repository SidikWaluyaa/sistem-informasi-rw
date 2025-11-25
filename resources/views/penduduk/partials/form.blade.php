@php
    $jk = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
    $status = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
    $hub = ['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Orang Tua', 'Lainnya'];
    $golds = ['A', 'B', 'AB', 'O', '-'];
    $kew = ['WNI', 'WNA'];
    $listKK = \App\Models\KartuKeluarga::orderBy('no_kk')->get(['id', 'no_kk']);
@endphp
<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">NIK</label>
        <input type="text" name="nik" class="form-control" maxlength="16" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">No KK</label>
        <select name="kk_id" class="form-select" required>
            <option value="">-- pilih --</option>
            @foreach ($listKK as $k)
                <option value="{{ $k->id }}">{{ $k->no_kk }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select" required>
            @foreach ($jk as $k => $v)
                <option value="{{ $k }}">{{ $v }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Golongan Darah</label>
        <select name="gol_darah" class="form-select">
            <option value="">-</option>
            @foreach ($golds as $g)
                <option value="{{ $g }}">{{ $g }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Agama</label>
        <input type="text" name="agama" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Status Perkawinan</label>
        <select name="status_perkawinan" class="form-select" required>
            @foreach ($status as $s)
                <option value="{{ $s }}">{{ $s }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Pendidikan</label>
        <input type="text" name="pendidikan" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Pekerjaan</label>
        <input type="text" name="pekerjaan" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Kewarganegaraan</label>
        <select name="kewarganegaraan" class="form-select" required>
            @foreach ($kew as $k)
                <option value="{{ $k }}">{{ $k }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">No Paspor</label>
        <input type="text" name="no_paspor" class="form-control" maxlength="20">
    </div>
    <div class="col-md-4">
        <label class="form-label">No KITAP</label>
        <input type="text" name="no_kitap" class="form-control" maxlength="20">
    </div>
    <div class="col-md-4">
        <label class="form-label">Hubungan Keluarga</label>
        <select name="hubungan_keluarga" class="form-select" required>
            @foreach ($hub as $h)
                <option value="{{ $h }}">{{ $h }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Alamat (sesuai KTP)</label>
        <textarea name="alamat_ktp" class="form-control" rows="2"></textarea>
    </div>
</div>
