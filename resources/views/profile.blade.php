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
          <li><a class="nav-link scrollto active" href="{{ route('profile') }}">Profil</a></li>
          <li><a class="nav-link scrollto" href="{{ route('search') }}">Cari</a></li>
          <li><a class="nav-link scrollto" href="/#pengaduan">Pengaduan</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

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
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3>SMK <em>Cinta Kasih Tzu Chi</em>Pusat Keunggulan</h3>
            <p>Center for Excellence Bidang Akuntansi, Administrasi Perkantoran dan Rekayasa Perangkat Lunak.</p>
            <a class="cta-btn align-self-start" href="/#pengaduan">Mulai Memberikan Pengaduan</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <div class="img">
              <img src="{{ asset('template/assets/img/cta.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="portfolio" class="portfolio" data-aos="fade-up">

      <div class="container">

        <div class="section-header">
          <h2>Galeri</h2>
          <p>Galeri Sekolah Kami</p>
        </div>

      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Achievement</li>
            <li data-filter=".filter-product">Edukasi</li>
            <li data-filter=".filter-branding">Kegiatan</li>
          </ul>

          <div class="row g-0 portfolio-container">

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="{{ asset('assets/gallery/achievement-1.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Achievement 1</h4>
                <a href="{{ asset('assets/gallery/achievement-1.jpg')}}" title="App 1" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-product">
              <img src="{{ asset('assets/gallery/edukasi-1.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Edukasi 1</h4>
                <a href="{{ asset('assets/gallery/edukasi-1.jpg') }}" title="Product 1" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-branding">
              <img src="{{ asset('assets/gallery/kegiatan-1.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Kegiatan 1</h4>
                <a href="{{ asset('assets/gallery/kegiatan-1.jpg') }}" title="Branding 1" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="{{ asset('assets/gallery/achievement-2.png') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Achievement 2</h4>
                <a href="{{ asset('assets/gallery/achievement-2.png') }}" title="App 2" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-product">
              <img src="{{ asset('assets/gallery/edukasi-2.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Edukasi 2</h4>
                <a href="{{ asset('assets/gallery/edukasi-2.jpeg') }}" title="Product 2" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-branding">
              <img src="{{ asset('assets/gallery/kegiatan-2.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Kegiatan 2</h4>
                <a href="{{ asset('assets/gallery/kegiatan-2.jpg') }}" title="Branding 2" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="{{ asset('assets/gallery/achievement-3.png') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Achievement 3</h4>
                <a href="{{ asset('assets/gallery/achievement-3.png') }}" title="App 3" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-product">
              <img src="{{ asset('assets/gallery/edukasi-3.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Edukasi 3</h4>
                <a href="{{ asset('assets/gallery/edukasi-3.jpeg') }}" title="Product 3" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-branding">
              <img src="{{ asset('assets/gallery/kegiatan-3.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Kegiatan 3</h4>
                <a href="{{ asset('assets/gallery/kegiatan-3.jpg') }}" title="Branding 2" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>

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
