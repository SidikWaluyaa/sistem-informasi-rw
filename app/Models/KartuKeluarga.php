<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class KartuKeluarga extends Model
{
    use HasFactory;


    protected $fillable = [
    'no_kk', 'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos', 'kepala_keluarga'
    ];


    public function anggota(): HasMany
    {
        return $this->hasMany(Penduduk::class, 'kk_id');
    }


    public function kepalaKeluarga(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'kepala_keluarga');
    }


    // Scope pencarian sederhana
    public function scopeSearch($query, $term)
    {
        if (!$term) return $query;
        $term = "%".strtolower($term)."%";
        return $query->whereRaw('LOWER(no_kk) LIKE ?', [$term])
            ->orWhereRaw('LOWER(alamat) LIKE ?', [$term])
            ->orWhereRaw('LOWER(kelurahan) LIKE ?', [$term])
            ->orWhereRaw('LOWER(kecamatan) LIKE ?', [$term]);
    }
}
