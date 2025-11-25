<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Profil;
use App\Models\Galeri;
use App\Models\Struktur;

class HomepageController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        $beritas = Berita::latest()->take(3)->get();
        $agendas = Agenda::where('tanggal', '>=', now())->orderBy('tanggal', 'asc')->take(4)->get();
        $galeris = Galeri::latest()->take(6)->get();
        $strukturs = Struktur::orderBy('id', 'asc')->take(6)->get();

        return view('home', compact('profil', 'beritas', 'agendas', 'galeris', 'strukturs'));
    }
}
