<?php

namespace App\Http\Controllers\Pasien;

use App\Models\JadwalPeriksa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = Auth()->user();
        $jadwalPeriksas = JadwalPeriksa::where('id_dokter', $dokter->id)
            ->orderBy('hari','asc')
            ->get();
        return view('dokter.jadwal-periksa.index',compact('jadwalPeriksas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dokter = Auth()->user();

        $validatedData = $request->validate([
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        $validatedData['id_dokter'] = $dokter->id;

        JadwalPeriksa::create($validatedData);

        return redirect()->route('jadwal-periksa.index')->with('message', 'Jadwal Periksa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);
        return view('dokter.jadwal-periksa.edit', compact('jadwalPeriksa'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        JadwalPeriksa::where('id', $id)->update($validatedData);

        return redirect()->route('jadwal-periksa.index')->with('message', 'Jadwal Periksa berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);
        $jadwalPeriksa->delete();
        return redirect()->route('jadwal-periksa.index')->with('message', 'Jadwal Periksa berhasil dihapus!')->with('type', 'success');
    }
}
