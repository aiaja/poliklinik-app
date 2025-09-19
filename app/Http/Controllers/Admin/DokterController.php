<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = User::where('role', 'dokter')->with('poli')->get();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('admin.dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:16|unique:users,no_ktp',
            'no_hp' => 'required|string|max:15',
            'id_poli' => 'required|exists:poli,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dokter',
        ]);

        return redirect()->route('dokter.index')
            ->with('message', 'Dokter berhasil ditambahkan.')
            ->with('type', 'success');
    }

    public function edit($id)
    {
        $polis = Poli::all();
        $dokter = User::where('role', 'dokter')->findOrFail($id);
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request, User $dokter)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:16|unique:users,no_ktp,' . $dokter->id,
            'no_hp' => 'required|string|max:15',
            'id_poli' => 'required|exists:poli,id',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($dokter->id)],
            'password' => 'nullable|string|min:6',
        ]);

        $data = $validated;
        if(!empty($validated['password'])){
            $data['password'] = Hash::make($validated['password']);
        } else {
            unset($data['password']);
        }

        $dokter->update($data);

        return redirect()->route('dokter.index')->with('messages', 'Dokter berhasil diperbarui.')->with('type', 'success');
    }
}
