@extends('layouts.admin.main')

@section('content')
<div class="pagetitle">
    <h1 class="text-success">Kategori</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Aspirasi</a></li>
        <li class="breadcrumb-item active">Buat Aspirasi</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
      <h5 class="card-title text-success">Buat Aspirasi</h5>

      <form class="row g-3" method="POST" action="{{ route('aspirasi.store', $id_pelaporan) }}">
        @csrf
        <div class="col-12">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                <option value="Menunggu" selected>Menunggu</option>
                <option value="Proses" {{ old('status') === 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai" {{ old('status') === 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            @error('status')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="col-12">
            <label for="feedback">Feedback</label>
            <textarea name="feedback" id="feedback" rows="5" class="form-control @error('feedback') is-invalid @enderror">{{ old('feedback') }}</textarea>

            @error('feedback')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
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
