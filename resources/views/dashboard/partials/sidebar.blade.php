<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ Request::is('dashboard')? 'active' : '' }}">
      <a class="nav-link " href="/dashboard">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    @can('nasabah')
    <li class="nav-item nav-category">Rekening Nasabah</li>
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Rekening Anda</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Histori Transaksi</span>
      </a>
    </li>
    @endcan

    @can('administrator')
    <li class="nav-item {{ Request::is('dashboard/penimbangan*')? 'active' : '' }}">
      <a class="nav-link " href="/dashboard/penimbangan">
        <i class="menu-icon mdi mdi-bank-transfer "></i>
        <span class="menu-title">Penimbangan</span>
      </a>
    </li>
    <li class="nav-item nav-category">Pengelolaan Sampah</li>
    <li class="nav-item {{ Request::is('dashboard/jenis-sampah*')? 'active' : '' }}">
      <a class="nav-link" href="/dashboard/jenis-sampah">
        <i class="menu-icon mdi mdi-shape-outline"></i>
        <span class="menu-title">Jenis Sampah</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/histori*')? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#transaksis" aria-expanded="false" aria-controls="transaksis">
        <i class="menu-icon mdi mdi-receipt"></i>
        <span class="menu-title">Transaksi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="transaksis">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ Request::is('dashboard/histori/penyetoran')? 'active' : '' }}"><a class="nav-link"
              href="{{ route('histori.penyetoran') }}">Setoran Sampah</a></li>
          <li class="nav-item {{ Request::is('dashboard/histori/penarikan')? 'active' : '' }}"><a class="nav-link"
              href="{{ route('histori.penarikan') }}">Penarikan Sampah</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ Request::is('dashboard/inventori')? 'active' : '' }}">
      <a class="nav-link" href="{{ route('inventori.sampah') }}">
        <i class="menu-icon mdi mdi-archive"></i>
        <span class="menu-title">Inventori Sampah</span>
      </a>
    </li>
    <li class="nav-item nav-category">Inventaris Bank Sampah</li>
    <li class="nav-item {{ Request::is('dashboard/buku-rekening*')? 'active' : '' }}">
      <a class="nav-link" href="{{ route('buku-rekening.index') }}">
        <i class="menu-icon mdi mdi-book-open-page-variant"></i>
        <span class="menu-title">Buku Rekening</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/penarikan-saldo*')? 'active' : '' }}">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-credit-card"></i>
        <span class="menu-title">Penarikan Saldo</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/rekapitulasi')? 'active' : '' }}">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-chart-areaspline-variant"></i>
        <span class="menu-title">Rekapitulasi</span>
      </a>
    </li>
    <li class="nav-item nav-category">Pengaturan Pengguna</li>
    <li class="nav-item {{ Request::is('dashboard/pengguna*')? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#pengguna" aria-expanded="false" aria-controls="pengguna">
        <i class="menu-icon mdi mdi-account-group-outline"></i>
        <span class="menu-title">Pengguna</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="pengguna">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ Request::is('dashboard/pengguna/nasabah')? 'active' : '' }}"><a class="nav-link"
              href="{{ route('user.nasabah.index') }}">Nasabah</a></li>
          <li class="nav-item {{ Request::is('dashboard/pengguna/petugas')? 'active' : '' }}"><a class="nav-link"
              href="{{ route('user.petugas.index') }}">Petugas</a></li>
          <li class="nav-item {{ Request::is('dashboard/pengguna/administrator')? 'active' : '' }}"><a class="nav-link"
              href="{{ route('user.administrator.index') }}">Administrator</a></li>
        </ul>
      </div>
    </li>
    @endcan
    
  </ul>
</nav>