@extends('layouts.admin.main')

@section('content')
<div class="pagetitle">
    <h1 class="text-success">Siswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
        <li class="breadcrumb-item active">Tambah Siswa</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
      <h5 class="card-title text-success">Tambah Data Siswa</h5>

      <form class="row g-3" method="POST" action="{{ route('siswa.store') }}">
        @csrf
        <div class="col-12">
          <label for="nisn" class="form-label">NISN</label>
          <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}">

          @error('nisn')
              <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="col-12">
          <label for="kelas" class="form-label">Kelas</label>
          <select name="kelas" id="kelas" class="form-select @error('kelas') is-invalid @enderror">
            <option selected value="">-- Pilih Kelas --</option>
            <option value="X AKL" {{ old('kelas') === 'X AKL' ? 'selected' : '' }}>X AKL</option>
            <option value="X MPLB" {{ old('kelas') === 'X MPLB' ? 'selected' : '' }}>X MPLB</option>
            <option value="X PPLG 1" {{ old('kelas') === 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1</option>
            <option value="X PPLG 2" {{ old('kelas') === 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2</option>
            <option value="XI AKL" {{ old('kelas') === 'XI AKL' ? 'selected' : '' }}>XI AKL</option>
            <option value="XI MPLB" {{ old('kelas') === 'XI MPLB' ? 'selected' : '' }}>XI MPLB</option>
            <option value="XI PPLG 1" {{ old('kelas') === 'XI PPLG 1' ? 'selected' : '' }}>XI PPLG 1</option>
            <option value="XI PPLG 2" {{ old('kelas') === 'XI PPLG 2' ? 'selected' : '' }}>XI PPLG 2</option>
            <option value="XII AKL" {{ old('kelas') === 'XII AKL' ? 'selected' : '' }}>XII AKL</option>
            <option value="XII OTKP" {{ old('kelas') === 'XII OTKP' ? 'selected' : '' }}>XII OTKP</option>
            <option value="XII RPL 1" {{ old('kelas') === 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1</option>
            <option value="XII RPL 2" {{ old('kelas') === 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2</option>
          </select>

            @error('kelas')
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
