@extends('layouts.admin.main')

@section('content')
<div class="pagetitle">
    <h1 class="text-success">Input Aspirasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inputaspirasi.index') }}">Input Aspirasi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="card-title text-success">Detail Input Aspirasi</h1>
        </div>

        <div class="">
            <img src="{{ asset('pengaduan/' . $inputaspirasi->foto) }}" alt="Foto" class="img-fluid">

            <div class="mt-3">
                <div class="row align-items-center justify-content-between">
                    <h5 class="mt-3 col">NIS</h5>
                    <p class="col">{{ $inputaspirasi->nis }}</p>
                </div>
            </div>

            <div>
                <div class="row align-items-center justify-content-between">
                    <h5 class="mt-3 col">Kelas</h5>
                    <p class="col">{{ $inputaspirasi->siswa->kelas }}</p>
                </div>
            </div>

            <div>
                <div class="row align-items-center justify-content-between">
                    <h5 class="mt-3 col">Kategori</h5>
                    <p class="col">{{ $inputaspirasi->kategori->ket_kategori }}</p>
                </div>
            </div>

            <div>
                <div class="row align-items-center justify-content-between">
                    <h5 class="mt-3 col">Lokasi</h5>
                    <p class="col">{{ $inputaspirasi->lokasi }}</p>
                </div>
            </div>

            <div>
                <div class="row align-items-center justify-content-between">
                    <h5 class="mt-3 col">Keterangan</h5>
                    <p class="col">{{ $inputaspirasi->ket }}</p>
                </div>
            </div>

            <div>
                <div class="row align-items-center justify-content-between">
                    <h5 class="mt-3 col">Status</h5>

                    @if(count($inputaspirasi->aspirasi) > 0 )
                        <p class="col">{{ Str::ucfirst(App\Models\Aspirasi::where('id_input_aspirasi', $inputaspirasi->id)->latest()->first()->status) }}</p>
                    @else
                        <p class="col">Menunggu</p>
                    @endif
                </div>
            </div>

            @if(count($inputaspirasi->aspirasi) > 0 )
                <div class="mt-3">
                    <h5>Histori Aspirasi: </h5>

                    @foreach(App\Models\Aspirasi::where('id_pelaporan', $inputaspirasi->id_pelaporan)->get() as $aspirasi)
                        <div>
                            <b>{{ $aspirasi->created_at }} - {{ $aspirasi->feedback }}</b>
                        </div>
                    @endforeach
                </div>
            @endif

            <a href="" class="mt-3">
                <button class="btn btn-primary">Buat Tanggapan</button>
            </a>
        </div>
    </div>
</div>
@endsection
