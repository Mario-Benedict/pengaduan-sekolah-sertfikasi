@extends('layouts.admin.main')

@section('content')
<div class="pagetitle">
    <h1 class="text-success">Siswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Siswa</li>
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
            <h1 class="card-title text-success">Data Siswa</h1>

            <a href="{{ route('siswa.create') }}">
                <button type="button" class="btn btn-success">Tambah Siswa</button>
            </a>
        </div>

        <table class="table table-striped text-center">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">NISN</th>
            <th scope="col">Kelas</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $key=>$student)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $student->nisn }}</td>
                    <td>{{ $student->kelas }}</td>
                    <td>
                        <div>
                            <a href="{{ route('siswa.edit', $student->nisn) }}">
                                <button type="button" class="btn btn-success">Ubah</button>
                            </a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#siswaDeleteModal{{ $student->nisn }}">
                                Hapus
                            </button>

                            <div class="modal fade" id="siswaDeleteModal{{ $student->nisn }}" tabindex="-1" aria-labelledby="siswaDeleteModalLabel{{ $student->nisn }}" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="siswaDeleteModalLabel{{ $student->nisn }}">Hapus Data Siswa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data siswa dengan NISN <b>{{ $student->nisn }}</b>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('siswa.destroy', $student->nisn) }}" method="POST">
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
                    <td colspan="4" class="text-center">Tidak ada data siswa yang ditemukan</td>
                </tr>
            @endforelse
        </tbody>
        </table>
        {{ $students->links() }}
    </div>
</div>
@endsection
