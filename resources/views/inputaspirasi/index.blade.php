@extends('layouts.admin.main')

@section('content')
<div class="pagetitle">
    <h1 class="text-success">Input Aspirasi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Input Aspirasi</li>
      </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="card-title text-success">Input Aspirasi</h1>

            <a href="{{ route('cetak') }}">
                <button type="button" class="btn btn-success">Cetak</button>
            </a>
        </div>

        <form>
            <div class="row g-3 py-3 align-items-center">
                <div class="col-12">
                    <input type="search" name="search" class="form-control" placeholder="Cari...">
                </div>

                <div class="col-md-6">
                    <span>From</span>
                    <input type="date" class="form-control" name="from">
                </div>

                <div class="col-md-6">
                    <span>To</span>
                    <input type="date" class="form-control" name="to">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-success">Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Kategori</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inputaspirasis as $key=>$inputaspirasi)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $inputaspirasi->nis }}</td>
                    <td>{{ $inputaspirasi->kategori->ket_kategori }}</td>
                    <td>{{ $inputaspirasi->lokasi }}</td>
                    <td>{{ Str::limit($inputaspirasi->ket, 30, '...') }}</td>
                    <td>
                        <img src="{{ asset('pengaduan/' . $inputaspirasi->foto) }}" alt="{{ $inputaspirasi->foto }}" width="100px">
                    </td>
                    <td>
                        @if(count(\App\Models\Aspirasi::where('id_pelaporan', $inputaspirasi->id_pelaporan)->get()) > 0)
                            @if(\App\Models\Aspirasi::where('id_pelaporan', $inputaspirasi->id_pelaporan)->latest()->first()->status === 'Menunggu')
                                <div class="badge rounded-pill text-bg-warning">{{ \App\Models\Aspirasi::where('id_pelaporan', $inputaspirasi->id_pelaporan)->latest()->first()->status }}</div>
                            @elseif (\App\Models\Aspirasi::where('id_pelaporan', $inputaspirasi->id_pelaporan)->latest()->first()->status === 'Proses')
                                <div class="badge rounded-pill text-bg-info">{{ \App\Models\Aspirasi::where('id_pelaporan', $inputaspirasi->id_pelaporan)->latest()->first()->status }}</div>
                            @else
                                <div class="badge rounded-pill text-bg-success">{{ \App\Models\Aspirasi::where('id_pelaporan', $inputaspirasi->id_pelaporan)->latest()->first()->status }}</div>
                            @endif
                        @else
                            <div class="badge rounded-pill text-bg-warning">Menunggu</div>
                        @endif
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('inputaspirasi.show', $inputaspirasi->id_pelaporan) }}">
                                <button type="button" class="btn btn-success">Detail</button>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pengaduan yang ditemukan</td>
                </tr>
            @endforelse
        </tbody>
        </table>
        {{ $inputaspirasis->links() }}
    </div>
</div>
@endsection
