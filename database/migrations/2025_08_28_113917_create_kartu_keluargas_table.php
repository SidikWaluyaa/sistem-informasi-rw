<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', 16)->unique();
            $table->text('alamat');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('kabupaten', 100);
            $table->string('provinsi', 100);
            $table->string('kode_pos', 10)->nullable();
            // kepala_keluarga -> penduduk.id (dibuat nullable tanpa FK langsung untuk menghindari urutan migasi)
            $table->unsignedBigInteger('kepala_keluarga')->nullable()->index();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('kartu_keluargas');
    }
};
