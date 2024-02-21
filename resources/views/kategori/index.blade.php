@extends('layouts.admin.main')

@section('content')
<div class="pagetitle">
    <h1 class="text-success">Kategori</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Kategori</li>
      </ol>
    </nav>
</div>

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif


<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="card-title text-success">Data Kategori</h1>

            <a href="{{ route('kategori.create') }}">
                <button type="button" class="btn btn-success">Tambah Kategori</button>
            </a>
        </div>

        <table class="table table-striped text-center">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Keterangan Kategori</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $key=>$category)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $category->ket_kategori }}</td>
                    <td>
                        <div>
                            <a href="{{ route('kategori.edit', $category->id_kategori) }}">
                                <button type="button" class="btn btn-success">Ubah</button>
                            </a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kategoriDeleteModal{{ $category->id_kategori }}">
                                Hapus
                            </button>

                            <div class="modal fade" id="kategoriDeleteModal{{ $category->id_kategori }}" tabindex="-1" aria-labelledby="kategoriDeleteModalLabel{{ $category->id_kategori }}" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="kategoriDeleteModalLabel{{ $category->id_kategori }}">Hapus Data Siswa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data kategori dengan keterangan <b>{{ $category->ket_kategori }}</b>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('kategori.destroy', $category->id_kategori) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data kategori yang ditemukan</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>
</div>
@endsection
