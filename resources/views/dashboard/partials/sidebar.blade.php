<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{ Request::is('dashboard')? 'active' : '' }}">
        <a class="nav-link " href="/dashboard">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
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
            <li class="nav-item {{ Request::is('dashboard/histori/penyetoran')? 'active' : '' }}"><a class="nav-link" href="{{ route('histori.penyetoran') }}">Setoran Sampah</a></li>
            <li class="nav-item {{ Request::is('dashboard/histori/penarikan')? 'active' : '' }}"><a class="nav-link" href="{{ route('histori.penarikan') }}">Penarikan Sampah</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::is('dashboard/inventori')? 'active' : '' }}">
        <a class="nav-link" href="{{ route('inventori.sampah') }}">
          <i class="menu-icon mdi mdi-archive"></i>
          <span class="menu-title">Inventori Sampah</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('dashboard/nasabah')? 'active' : '' }}">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Nasabah</span>
        </a>
      </li>
      <li class="nav-item nav-category">Inventaris Bank Sampah</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Form elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="menu-icon mdi mdi-layers-outline"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">pages</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>