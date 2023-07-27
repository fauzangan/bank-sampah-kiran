@extends('dashboard.layouts.main')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="statistics-details d-flex align-items-center justify-content-between">
      <div>
        <p class="statistics-title">Bounce Rate</p>
        <h3 class="rate-percentage">32.53%</h3>
        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
      </div>
      <div>
        <p class="statistics-title">Page Views</p>
        <h3 class="rate-percentage">7,682</h3>
        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
      </div>
      <div>
        <p class="statistics-title">New Sessions</p>
        <h3 class="rate-percentage">68.8</h3>
        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Avg. Time on Site</p>
        <h3 class="rate-percentage">2m:35s</h3>
        <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">New Sessions</p>
        <h3 class="rate-percentage">68.8</h3>
        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Avg. Time on Site</p>
        <h3 class="rate-percentage">2m:35s</h3>
        <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="row flex-grow">
    <div class="col-8 grid-margin stretch-card">
      <div class="card card-rounded">
        <div class="card-body">
          <div class="d-sm-flex justify-content-between align-items-start">
            <div>
              <h4 class="card-title card-title-dash">Tinjauan Pasar</h4>
              <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
          </div>
          <div class="d-sm-flex align-items-center mt-1 justify-content-between">
            <div class="d-sm-flex align-items-center mt-4 justify-content-between">
              <h2 class="me-2 fw-bold">Rp 550.000,00</h2>
              <h4 class="me-2">IDR</h4>
              <h4 class="text-success">(+1.37%)</h4>
            </div>
            <div class="me-3">
              <div id="marketing-overview-legend"></div>
            </div>
          </div>
          <div class="chartjs-bar-wrapper mt-3">
            <canvas id="marketingOverview"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4 grid-margin strecth-card">
      <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
          <div class="card card-rounded">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title card-title-dash">Penimbangan Berdasarkan Jenis Sampah</h4>
                  </div>
                  <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                  <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>