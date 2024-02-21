@extends('layouts.admin.main')

@section('content')
<div>
    <h1 class="text-success">Siswa</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
        <li class="breadcrumb-item active">Ubah Siswa</li>
        </ol>
    </nav>
</div>


<div class="card">
    <div class="card-body">
      <h5 class="card-title text-success">Tambah Data Siswa</h5>

      <form class="row g-3" method="POST" action="{{ route('siswa.update', $student->nis) }}">
        @csrf
        @method('PUT')
        <div class="col-12">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ $student->nis }}">

          @error('nis')
              <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="col-12">
          <label for="kelas" class="form-label">Kelas</label>
          <select name="kelas" id="kelas" class="form-select @error('kelas') is-invalid @enderror">
            <option selected value="">-- Pilih Kelas --</option>
            <option value="X AKL" {{ $student->kelas === 'X AKL' ? 'selected' : '' }}>X AKL</option>
            <option value="X MPLB" {{ $student->kelas === 'X MPLB' ? 'selected' : '' }}>X MPLB</option>
            <option value="X PPLG 1" {{ $student->kelas === 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1</option>
            <option value="X PPLG 2" {{ $student->kelas === 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2</option>
            <option value="XI AKL" {{ $student->kelas === 'XI AKL' ? 'selected' : '' }}>XI AKL</option>
            <option value="XI MPLB" {{ $student->kelas === 'XI MPLB' ? 'selected' : '' }}>XI MPLB</option>
            <option value="XI PPLG 1" {{ $student->kelas === 'XI PPLG 1' ? 'selected' : '' }}>XI PPLG 1</option>
            <option value="XI PPLG 2" {{ $student->kelas === 'XI PPLG 2' ? 'selected' : '' }}>XI PPLG 2</option>
            <option value="XII AKL" {{ $student->kelas === 'XII AKL' ? 'selected' : '' }}>XII AKL</option>
            <option value="XII OTKP" {{ $student->kelas === 'XII OTKP' ? 'selected' : '' }}>XII OTKP</option>
            <option value="XII RPL 1" {{ $student->kelas === 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1</option>
            <option value="XII RPL 2" {{ $student->kelas === 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2</option>
          </select>

            @error('kelas')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success">Ubah</button>
          <button type="reset" class="btn btn-secondary">Batal</button>
        </div>
      </form>

    </div>
</div>
@endsection
