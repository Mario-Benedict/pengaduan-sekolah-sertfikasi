<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Kategori;
use App\Models\Siswa;


class InputAspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inputaspirasis = InputAspirasi::with('kategori')->paginate(10);

        return view('inputaspirasi.index', compact('inputaspirasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $allowedCategory = Kategori::pluck('id_kategori')->toArray();

        $validator = Validator::make($request->all(), [
            'nis' => ['required', 'numeric', 'digits:10'],
            'kategori' => ['required', 'integer', 'in:' . implode(',', $allowedCategory)],
            'lokasi' => ['required', 'string', 'max:50'],
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'ket' => ['required', 'string']
        ], [
            'nis.required' => 'NIS harus diisi',
            'nis.numeric' => 'NIS harus berupa angka',
            'nis.digits' => 'NIS harus 10 digit',
            'kategori.required' => 'Kategori harus diisi',
            'kategori.integer' => 'Kategori harus berupa angka',
            'kategori.in' => 'Kategori tidak valid',
            'lokasi.required' => 'Lokasi harus diisi',
            'lokasi.max' => 'Lokasi maksimal 50 karakter',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berformat jpeg, png, jpg',
            'foto.max' => 'Foto maksimal 2MB',
            'ket.required' => 'Keterangan harus diisi'
        ]);

        if ($validator->fails()) {
            return redirect('/#pengaduan')
                ->withErrors($validator)
                ->withInput();
        }

        if (Siswa::where('nis', $request->get('nis'))->doesntExist()) {
            return redirect('/#pengaduan')
                ->withErrors(['nis' => 'NIS tidak terdaftar'])
                ->withInput();
        }

        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $destination = public_path('pengaduan');

        $file->move($destination, $fileName);

        InputAspirasi::create([
            'nis' => $request->get('nis'),
            'id_kategori' => $request->get('kategori'),
            'lokasi' => $request->get('lokasi'),
            'foto' => $fileName,
            'ket' => $request->get('ket')
        ]);

        return redirect('/#pengaduan')->with('success', 'Pengaduan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inputaspirasi = InputAspirasi::with('kategori', 'siswa', 'aspirasi')->find($id);

        return view('inputaspirasi.show', compact('inputaspirasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}