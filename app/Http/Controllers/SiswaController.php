<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Siswa::all();

        return view('siswa.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => ['required', 'string', 'digits:10', 'unique:siswas,nisn'],
            'kelas' => ['required', 'string', 'max:10'],
        ], [
            'nisn.required' => 'NISN harus diisi',
            'nisn.digits' => 'NISN harus 10 digit',
            'nisn.unique' => 'NISN sudah terdaftar',
            'kelas.required' => 'Kelas harus diisi',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
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
        $student = Siswa::find($id);

        return view('siswa.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nisn' => ['required', 'string', 'digits:10', 'unique:siswas,nisn,' . $id . ',nisn'],
            'kelas' => ['required', 'string', 'max:10'],
        ], [
            'nisn.required' => 'NISN harus diisi',
            'nisn.digits' => 'NISN harus 10 digit',
            'nisn.unique' => 'NISN sudah terdaftar',
            'kelas.required' => 'Kelas harus diisi',
        ]);

        Siswa::find($id)->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::destroy($id);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
