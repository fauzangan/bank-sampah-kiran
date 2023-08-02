@extends('dashboard.layouts.main')
@section('content')

{{-- Navbar Info --}}
<div class="row">
  <div class="col-sm-12">
    <div class="statistics-details d-flex align-items-center justify-content-between">
      <div>
        <p class="statistics-title">Nasabah</p>
        <h3 class="rate-percentage">{{ $jumlahNasabah }}</h3>
      </div>
      <div>
        <p class="statistics-title">Petugas</p>
        <h3 class="rate-percentage">{{ $jumlahPetugas }}</h3>
      </div>
      <div>
        <p class="statistics-title">Administrator</p>
        <h3 class="rate-percentage">{{ $jumlahAdministrator }}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Total Transaksi Penimbangan</p>
        <h3 class="rate-percentage">{{ $jumlahPenimbangan }}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Total Berat Akumulasi</p>
        <h3 class="rate-percentage">{{ $totalSampah }} Kg</h3>
      </div>
    </div>
  </div>
</div>
{{-- Navbar Info --}}
<div class="row">
  <div class="col-lg-8 d-flex flex-column">
    <div class="row flex-grow">
      <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title card-title-dash">Penjualan Sampah</h4>
                <p class="card-subtitle card-subtitle-dash">Laporan Penjualan Sampah pada tahun ini</p>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-md-auto">
                <h4>Saldo: </h4>
              </div>
              <div class="col-4">
                <h2 class="fw-bold">Rp {{ number_format($reportSaldo,2,",",".") }}</h2>
              </div>
              <div class="col-md-auto">
                <h4>Keuntungan: </h4>
              </div>
              <div class="col-4">
                <h2 class="fw-bold text-success">+Rp {{ number_format($reportKeuntungan,2,",",".") }}</h2>
              </div>
              <div class="d-sm-flex align-items-center justify-content-between">
                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                </div>
                {{-- <h4 class="me-2">Saldo: </h4> --}}
                {{-- <h2 class="me-2 fw-bold text-success">Rp {{ number_format($reportPenjualan,2,",",".") }}</h2> --}}
                {{-- <h4 class="text-success">(+1.37%)</h4> --}}
              </div>
            </div>
            <div class="chartjs-bar-wrapper mt-3">
              {!! $chartPenjualan->container() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 d-flex flex-column">
    <div class="row flex-grow">
      <div class="col-12 grid-margin strecth-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="card-title card-title-dash">Penimbangan Berdasarkan Jenis Sampah</h4>
                </div>
                {{-- <canvas class="my-auto" id="doughnutChart" height="200"></canvas> --}}
                {!! $chartPenimbangan->container() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row flex-grow">
      <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="card-title card-title-dash">Status Transaksi Rekening Nasabah</h4>
                </div>
                {!! $chartTransaksiNasabah->container() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ $chartPenimbangan->cdn() }}"></script>
<script src="{{ $chartPenjualan->cdn() }}"></script>
<script src="{{ $chartTransaksiNasabah->cdn() }}"></script>

{{ $chartPenimbangan->script() }}
{{ $chartPenjualan->script() }}
{{ $chartTransaksiNasabah->script() }}

<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection