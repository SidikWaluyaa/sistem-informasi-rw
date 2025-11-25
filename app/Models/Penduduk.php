<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    //
    use HasFactory;


    protected $fillable = [
        'nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','gol_darah','agama','status_perkawinan','pendidikan','pekerjaan','kewarganegaraan','no_paspor','no_kitap','hubungan_keluarga','kk_id','alamat_ktp'
    ];


    public function kk(): BelongsTo
    {
        return $this->belongsTo(KartuKeluarga::class, 'kk_id');
    }


    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['q'])) {
        $q = "%".strtolower($filters['q'])."%";
        $query->whereRaw('LOWER(nik) LIKE ?', [$q])
            ->orWhereRaw('LOWER(nama) LIKE ?', [$q]);
        }


        if (!empty($filters['no_kk'])) {
            $query->whereHas('kk', fn($kk)=>$kk->where('no_kk', $filters['no_kk']));
        }
    }
}
