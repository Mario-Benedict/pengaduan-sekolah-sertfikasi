<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link bg-success text-white" href="{{ route('home') }}"  style="--bs-bg-opacity: .75">
          <i class="bi bi-grid text-white"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="bg-success nav-link collapsed text-white" href="{{ route('siswa.index') }}" style="--bs-bg-opacity: .75">
          <i class="bi bi-person text-white"></i>
          <span>Siswa</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed bg-success text-white" href="{{ route('kategori.index') }}"  style="--bs-bg-opacity: .75">
          <i class="bi bi-question-circle text-white"></i>
          <span>Kategori</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed bg-success text-white" href="{{ route('inputaspirasi.index') }}"  style="--bs-bg-opacity: .75">
          <i class="bi bi-envelope text-white"></i>
          <span>Input Aspirasi</span>
        </a>
      </li>
    </ul>
</aside>
