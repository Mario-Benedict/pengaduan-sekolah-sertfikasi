<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body class="px-4">
    <div class="title text-center mb-5">
        <h2>Laporan Layanan Pengaduan Sekolah</h2>
        <h5>SMK Cinta Kasih Tzu Chi</h5>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Tanggal Pengaduan</th>
                <th class="text-center">NIS</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Lokasi</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($inputaspirasis as $key=>$input)
                <tr>
                    <td scope="row" class="text-center">{{ $key + 1 }}</td>
                    <td scope='col' class="text-center">
                        <img src="{{ public_path('pengaduan/' . $input->foto) }}" alt="{{ $input->foto }}" width="100px">
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($input->created_at)->isoFormat('dddd, D MMMM Y') }}
                    </td>
                    <td class="text-center">{{ $input->nis }}</td>
                    <td class="text-center">{{ $input->kategori->ket_kategori }}</td>
                    <td class="text-center">{{ $input->lokasi }}</td>
                    <td class="text-center">{{ Str::limit($input->ket, 30, '...') }}</td>
                    <td class="text-center">
                        @if(count(\App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->get()) > 0)
                            @if(\App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status === 'Menunggu')
                                <div class="badge badge-warning">{{ \App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status }}</div>
                            @elseif (\App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status === 'Proses')
                                <div class="badge badge-info">{{ \App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status }}</div>
                            @else
                                <div class="badge badge-success">{{ \App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status }}</div>
                            @endif
                        @else
                            <div class="badge badge-warning">Menunggu</div>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pengaduan yang ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
