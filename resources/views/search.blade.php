<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pengaduan Sekolah - SMK Cinta Kasih Tzu Chi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/logo.png') }}" rel="icon">
  <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  {{-- <link href="{{ asset('template/assets/css/variables.css') }}" rel="stylesheet"> --}}
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <link href="{{ asset('template/assets/css/variables-green.css') }}" rel="stylesheet">
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <link href="{{ asset('template/assets/css/main.css') }}" rel="stylesheet">

</head>

<body>
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <img src="{{ asset('assets/logo.png') }}" alt="logo sekolah">
        <h2>Pengaduan Sekolah</h2>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('profile') }}">Profil</a></li>
          <li><a class="nav-link scrollto" href="{{ route('search') }}">Cari</a></li>
          <li><a class="nav-link scrollto" href="/#pengaduan">Pengaduan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav>

      <div class="grid column-gap-3">
            @guest
                <a class="btn-getstarted g-col-6" href="{{ route('login') }}">Login</a>

                @if(Route::has('register'))
                    <a class="g-col-6" href="{{ route('register') }}">Register</a>
                @endif
            @endguest

            @auth
                <a href="/#pengaduan" class="btn-getstarted scrollto">Berikan Aspirasi</a>
            @endauth
      </div>

    </div>
  </header>

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <h2>Selamat Datang Di Website <span>Pengaduan Sekolah</span></h2>
      <p>Berikan aspirasimu untuk membangun sekolahmu</p>
      <div class="d-flex">
        <a href="/#pengaduan" class="btn-get-started scrollto">Berikan Aspirasi</a>
      </div>
    </div>
  </section>

  <main id="main">
    <section>
        <div class="container">

            <div class="section-header">
                <h2>Pengaduan</h2>
                <p>Cari Detail Pengaduan Anda</p>
            </div>

        </div>

      <div class="container">
        <form class="d-flex my-3" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIS</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Tanggal Pengaduan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($inputaspirasis as $key=>$input)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $input->nis }}</td>
                        <td>{{ $input->kategori->ket_kategori }}</td>
                        <td>{{ $input->lokasi }}</td>
                        <td>{{ Str::limit($input->ket, 30, '...') }}</td>
                        <td>
                            <img src="{{ asset('pengaduan/' . $input->foto) }}" alt="{{ $input->foto }}" width="100">
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($input->created_at)->isoFormat('dddd, D MMMM Y') }}
                        </td>
                        <td>
                            @if(count(\App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->get()) > 0)
                                @if(\App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status === 'Menunggu')
                                    <div class="badge rounded-pill text-bg-warning">{{ \App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status }}</div>
                                @elseif (\App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status === 'Proses')
                                    <div class="badge rounded-pill text-bg-info">{{ \App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status }}</div>
                                @else
                                    <div class="badge rounded-pill text-bg-success">{{ \App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->latest()->first()->status }}</div>
                                @endif
                            @else
                                <div class="badge rounded-pill text-bg-warning">Menunggu</div>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pengaduanModal{{ $input->id_pelaporan }}">Detail</button>

                            <div class="modal fade" id="pengaduanModal{{ $input->id_pelaporan }}" tabindex="-1" aria-labelledby="pengaduanModalLabel{{ $input->id_pelaporan }}" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="pengaduanModalLabel{{ $input->id_pelaporan }}">Detail Pengaduan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>History Aspirasi</h3>

                                        @if(count($input->aspirasi) > 0 )
                                            <div class="mt-3">
                                                @foreach(App\Models\Aspirasi::where('id_pelaporan', $input->id_pelaporan)->get() as $aspirasi)
                                                    <div>
                                                        <b>{{ $aspirasi->created_at }} - {{ $aspirasi->feedback }}</b>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="mt-3">
                                                Belum ada tanggapan
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Tidak ada data pengaduan yang ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong class="text-success"><span class=>SMK Cinta Kasih Tzu Chi</span> <span id="year"></span></strong>. All Rights Reserved
          </div>
        </div>
      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>

  <script src="{{ asset('template/assets/js/main.js') }}"></script>

  <script>
    const yearEl = document.getElementById('year');
    yearEl.textContent = new Date().getFullYear();
  </script>
</body>

</html>
