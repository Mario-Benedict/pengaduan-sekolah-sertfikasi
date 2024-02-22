<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Kategori::paginate(10);

        return view('kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ket_kategori' => ['required', 'string', 'max:30', 'unique:kategoris,ket_kategori']
        ], [
            'ket_kategori.required' => 'Nama kategori harus diisi',
            'ket_kategori.unique' => 'Nama kategori sudah terdaftar'
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
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
        $category = Kategori::find($id);

        return view('kategori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ket_kategori' => ['required', 'string', 'max:30', 'unique:kategoris,ket_kategori,' . $id . ',id_kategori', 'not_in:0']
        ], [
            'ket_kategori.required' => 'Nama kategori harus diisi',
            'ket_kategori.unique' => 'Nama kategori sudah terdaftar',
            'ket_kategori.not_in' => 'Nama kategori harus diisi'
        ]);

        Kategori::find($id)->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::destroy($id);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
