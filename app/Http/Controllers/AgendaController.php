<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function wargaIndex()
    {
        // Ambil semua agenda dengan paginasi, urutkan dari yang terbaru
        $agendas = Agenda::latest('tanggal')->paginate(5); // Tampilkan 5 agenda per halaman

        return view('warga.agenda.index', compact('agendas'));
    }
    public function wargaShow($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Ambil 3 agenda lain sebagai "agenda lainnya"
        $agendaLain = Agenda::where('id', '!=', $id)->latest('tanggal')->take(3)->get();

        return view('warga.agenda.show', compact('agenda', 'agendaLain'));
    }
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();
        return view('agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
        ]);

        Agenda::create($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
        ]);

        $agenda->update($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }
}
