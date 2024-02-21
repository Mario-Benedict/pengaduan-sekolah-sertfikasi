@extends('layouts.admin.main')

@section('content')
<div class="pagetitle">
    <h1 class="text-success">Kategori</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
        <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
      <h5 class="card-title text-success">Tambah Data Kategori</h5>

      <form class="row g-3" method="POST" action="{{ route('kategori.update', $category->id_kategori) }}">
        @csrf
        @method('PUT')
        <div class="col-12">
          <label for="ket_kategori" class="form-label">Keterangan Kategori</label>
          <input type="text" class="form-control @error('ket_kategori') is-invalid @enderror" id="ket_kategori" name="ket_kategori" value="{{ $category->ket_kategori }}">

          @error('ket_kategori')
              <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success">Tambah</button>
          <button type="reset" class="btn btn-secondary">Batal</button>
        </div>
      </form>

    </div>
</div>
@endsection
