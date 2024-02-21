<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('siswa.index') }}">
          <i class="bi bi-person"></i>
          <span>Siswa</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('kategori.index') }}">
          <i class="bi bi-question-circle"></i>
          <span>Kategori</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('inputaspirasi.index') }}">
          <i class="bi bi-envelope"></i>
          <span>Input Aspirasi</span>
        </a>
      </li>
    </ul>
</aside>
