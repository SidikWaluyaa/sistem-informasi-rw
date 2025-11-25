{{-- File: resources/views/profil/_form.blade.php --}}
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="nama_rw" class="form-label">Nama RW <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_rw" name="nama_rw"
                value="{{ old('nama_rw', $profil->nama_rw) }}" required>
        </div>
        <div class="mb-3">
            <label for="ketua_rw" class="form-label">Nama Ketua RW</label>
            <input type="text" class="form-control" id="ketua_rw" name="ketua_rw"
                value="{{ old('ketua_rw', $profil->ketua_rw) }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak (Telepon/Email)</label>
            <input type="text" class="form-control" id="kontak" name="kontak"
                value="{{ old('kontak', $profil->kontak) }}">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo RW</label>
            <input class="form-control" type="file" id="logo" name="logo">
            @if ($profil->logo)
                <div class="form-text">Kosongkan jika tidak ingin mengubah logo.</div>
                <img src="{{ asset('storage/' . $profil->logo) }}" class="img-thumbnail mt-2" width="100"
                    alt="Logo saat ini">
            @endif
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat Sekretariat</label>
    <textarea class="form-control" id="alamat" name="alamat" rows="2">{{ old('alamat', $profil->alamat) }}</textarea>
</div>
<hr>
<div class="mb-3">
    <label for="visi" class="form-label">Visi</label>
    <textarea class="form-control" id="visi" name="visi" rows="4">{{ old('visi', $profil->visi) }}</textarea>
</div>
<div class="mb-3">
    <label for="misi" class="form-label">Misi</label>
    <textarea class="form-control" id="misi" name="misi" rows="6">{{ old('misi', $profil->misi) }}</textarea>
</div>
<div class="mb-3">
    <label for="sejarah" class="form-label">Sejarah Singkat</label>
    <textarea class="form-control" id="sejarah" name="sejarah" rows="6">{{ old('sejarah', $profil->sejarah) }}</textarea>
</div>
<hr>
<div class="d-flex justify-content-end">
    {{-- Corrected Route Name --}}
    <a href="{{ route('admin.profil.index') }}" class="btn btn-secondary me-2">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</div>
