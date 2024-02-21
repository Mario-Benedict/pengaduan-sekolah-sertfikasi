<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pengaduan Sekolah - SMK Cinta Kasih Tzu Chi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/logo.png') }}" rel="icon">
  <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
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
      </nav><!-- .navbar -->

      <div class="grid column-gap-3">
            @guest
                <a class="btn-getstarted g-col-6" href="{{ route('login') }}">Login</a>
                <a class="g-col-6" href="{{ route('register') }}">Register</a>
            @endguest

            @auth
                <a href="#pengaduan" class="btn-getstarted scrollto">Berikan Aspirasi</a>
            @endauth
      </div>

    </div>
  </header><!-- End Header -->

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <h2>Selamat Datang Di Website <span>Pengaduan Sekolah</span></h2>
      <p>Berikan aspirasimu untuk membangun sekolahmu</p>
      <div class="d-flex">
        <a href="#pengaduan" class="btn-get-started scrollto">Berikan Aspirasi</a>
      </div>
    </div>
  </section>

  <main id="main">
    <section id="pengaduan" class="contact">
      <div class="container">

        <div class="section-header">
          <h2>Pengaduan</h2>
          <p>Berikan aspirasi Anda untuk sekolah SMK Cinta Kasih Tzu Chi</p>
        </div>

      </div>

      <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-12">
            <form action="{{ route('inputaspirasi.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="NIS" value="{{ old('nis') }}">

                        @error('nis')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror">
                            <option selected value="">-- Pilih Kategori --</option>
                            @foreach (\App\Models\Kategori::get() as $category)
                                <option value="{{ $category->id_kategori }}" {{ old('kategori') == $category->id_kategori ? 'selected' : '' }}>{{ $category->ket_kategori }}</option>
                            @endforeach
                        </select>

                        @error('kategori')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" placeholder="Lokasi" value="{{ old('lokasi') }}">

                    @error('lokasi')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto">

                    @error('foto')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control @error('ket') is-invalid @enderror" name="ket" placeholder="Keterangan" rows="5">{{ old('ket') }}</textarea>

                    @error('ket')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="text-center my-3"><button type="submit" class="btn btn-success">Kirim</button></div>
                </form>
            </div>
        </div>

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
