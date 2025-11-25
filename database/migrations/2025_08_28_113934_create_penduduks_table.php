<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->enum('gol_darah', ['A','B','AB','O','-'])->nullable();
            $table->string('agama', 20);
            $table->enum('status_perkawinan', ['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati']);
            $table->string('pendidikan', 50)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('kewarganegaraan', 3)->default('WNI');
            $table->string('no_paspor', 20)->nullable();
            $table->string('no_kitap', 20)->nullable();
            $table->enum('hubungan_keluarga', ['Kepala Keluarga','Istri','Anak','Cucu','Orang Tua','Lainnya']);
            $table->foreignId('kk_id')->constrained('kartu_keluargas')->restrictOnDelete();
            $table->text('alamat_ktp')->nullable();
            $table->timestamps();


            $table->index(['kk_id', 'nama']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
