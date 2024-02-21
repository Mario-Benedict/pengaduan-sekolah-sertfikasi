<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('aspirasi.create', ['id_pelaporan' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'string', 'in:Menunggu,Proses,Selesai'],
            'feedback' => ['required', 'string']
        ]);

        Aspirasi::create([
            'id_pelaporan' => $id,
            'status' => $request->get('status'),
            'feedback' => $request->get('feedback')
        ]);

        return redirect()->route('inputaspirasi.show', $id)->with('success', 'Aspirasi berhasil ditambahkan');
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
