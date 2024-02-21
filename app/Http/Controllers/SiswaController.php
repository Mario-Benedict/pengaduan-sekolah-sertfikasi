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
        $students = Siswa::paginate(10);

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
        $allowedKelas = ['X AKL', 'XI AKL', 'XII AKL',
                        'X MPLB', 'XI MPLB', 'XII MPLB',
                        'X PPLG 1', 'XI PPLG 1', 'XII RPL 1',
                        'X PPLG 2', 'XI PPLG 2', 'XII RPL 2'];

        $request->validate([
            'nis' => ['required', 'numeric', 'digits:10', 'unique:siswas,nis'],
            'kelas' => ['required', 'string', 'max:10', 'in:' . implode(',', $allowedKelas)],
        ], [
            'nis.required' => 'nis harus diisi',
            'nis.numeric' => 'nis harus berupa angka',
            'nis.digits' => 'nis harus 10 digit',
            'nis.unique' => 'nis sudah terdaftar',
            'kelas.required' => 'Kelas harus diisi',
            'kelas.in' => 'Kelas tidak valid',
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
        $allowedKelas = ['X AKL', 'XI AKL', 'XII AKL',
                        'X MPLB', 'XI MPLB', 'XII MPLB',
                        'X PPLG 1', 'XI PPLG 1i', 'XII RPL 1',
                        'X PPLG 2', 'XI PPLG 2', 'XII RPL 2'];

        $request->validate([
            'nis' => ['required', 'numeric', 'digits:10', 'unique:siswas,nis,' . $id . ',nis'],
            'kelas' => ['required', 'string', 'max:10', 'in:' . implode(',', $allowedKelas)],
        ], [
            'nis.required' => 'nis harus diisi',
            'nis.numeric' => 'nis harus berupa angka',
            'nis.digits' => 'nis harus 10 digit',
            'nis.unique' => 'nis sudah terdaftar',
            'kelas.required' => 'Kelas harus diisi',
            'kelas.in' => 'Kelas tidak valid',
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
