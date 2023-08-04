<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      @can('administrator')
      <a class="navbar-brand brand-logo" href="{{ route('dashboard.admin') }}">
        <img src="{{ asset('images/bank-sampah-kiran-logo.png') }}" alt="logo" width="150%" height="200px" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard.admin') }}">
        <img src="{{ asset('images/logo-mini.svg') }}" alt="logo" />
      </a>
      @endcan
      @can('petugas')
      <a class="navbar-brand brand-logo" href="{{ route('dashboard.petugas') }}">
        <img src="{{ asset('images/bank-sampah-kiran-logo.png') }}" alt="logo" width="150%" height="200px" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard.petugas') }}">
        <img src="{{ asset('images/logo-mini.svg') }}" alt="logo" />
      </a>
      @endcan
      @can('nasabah')
      <a class="navbar-brand brand-logo" href="{{ route('dashboard.nasabah') }}">
        <img src="{{ asset('images/bank-sampah-kiran-logo.png') }}" alt="logo" width="150%" height="200px" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard.nasabah') }}">
        <img src="{{ asset('images/logo-mini.svg') }}" alt="logo" />
      </a>
      @endcan
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top">
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text">Selamat datang kembali, <span class="text-black fw-bold">{{ auth()->user()->nama}}</span></h1>
        @can('administrator')
        <h3 class="welcome-sub-text">Kamu login sebagai <mark class="bg-success text-white">Administrator</mark></h3>
        @endcan
        @can('petugas')
        <h3 class="welcome-sub-text">Kamu login sebagai <mark class="bg-success text-white">Petugas</mark></h3>
        @endcan
        @can('nasabah')
        <h3 class="welcome-sub-text">Kamu login sebagai <mark class="bg-success text-white">Nasabah</mark></h3>
        @endcan
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="{{ asset('images/user-login.png') }}" alt="Profile image"></a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-xs rounded-circle" src="{{ asset('images/user-login.png') }}" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->nama }}</p>
            <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
          </div>
          <a class="dropdown-item" href="{{ route('user.detail-user') }}"><i
              class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profil Saya </a>
          <a class="dropdown-item" href="{{ route('user.change-password') }}"><i
              class="dropdown-item-icon mdi mdi-key-variant text-primary me-2"></i> Ubah Password</a>
          {{-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
            Log Aktivitas</a> --}}
          <form action="/logout" method="POSt">
            @csrf
            <button type="submit" class="dropdown-item"><i
                class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</button>
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>