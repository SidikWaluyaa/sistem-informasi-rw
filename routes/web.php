<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController; // Controller dari Breeze
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KKLookupController;


/*
|--------------------------------------------------------------------------
| Rute Halaman Publik (Frontend) - Bisa diakses siapa saja
|--------------------------------------------------------------------------
*/
Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/berita', [BeritaController::class, 'wargaIndex'])->name('warga.berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'wargaShow'])->name('warga.berita.show');
Route::get('/struktur', [StrukturController::class, 'wargaIndex'])->name('warga.struktur.index');
Route::get('/agenda', [AgendaController::class, 'wargaIndex'])->name('warga.agenda.index');
Route::get('/agenda/{id}', [AgendaController::class, 'wargaShow'])->name('warga.agenda.show');
Route::get('/galeri', [GaleriController::class, 'wargaIndex'])->name('warga.galeri.index');
Route::get('/profil', [ProfilController::class, 'wargaShow'])->name('warga.profil.show');

/*
|--------------------------------------------------------------------------
| Rute untuk Pengguna yang Sudah Login (Semua Peran: admin & user)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Halaman Dashboard umum
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('kartu-keluarga', KartuKeluargaController::class)->only(['index','store','update','destroy']);
    Route::resource('penduduk', PendudukController::class);



    Route::get('kk-lookup', [KKLookupController::class, 'index'])->name('kk.lookup');


    // Halaman untuk mengelola profil PENGGUNA itu sendiri (bukan profil RW)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Rute Panel Manajemen (Backend) - HANYA UNTUK ADMIN
|--------------------------------------------------------------------------
*/
// Rute di sini hanya bisa diakses oleh pengguna dengan peran 'admin'.
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Taruh semua rute manajemen konten Anda di sini

    Route::resource('berita', BeritaController::class);
    Route::resource('struktur',StrukturController::class);
    Route::resource('galeri',GaleriController::class);
    Route::resource('agenda',AgendaController::class);
    Route::resource('users', UserController::class);

    // Rute untuk mengelola Profil RW
    Route::get('profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil.index');
    Route::get('profil/edit', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('profil', [App\Http\Controllers\ProfilController::class, 'store'])->name('profil.store');
    Route::put('profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');
});


// File rute otentikasi dari Breeze (login, register, logout, dll.)
require __DIR__.'/auth.php';
