<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bank Sampah Kiran</title>
  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  {{-- Datatables --}}
  <link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.css" rel="stylesheet"/>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}"> --}}
  <!-- endinject -->

  <!-- Plugin css for this page -->
  {{-- <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}"> --}}
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
    <!-- partial:navbar-->
    @include('dashboard.layouts.navbar')
    <!-- end partial:navbar -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:ettings-panel -->
      @include('dashboard.partials.theme-setting')
      <!-- end partial:setting-panel -->

      <!-- partial:sidebar -->
      @include('dashboard.partials.sidebar')
      <!-- end partial:sidebar -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        {{-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer> --}}
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  {{-- Bootstrap 5 --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

  <!-- plugins:js -->
  {{-- <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script> --}}
  <!-- endinject -->
  <!-- Plugin js for this page -->
  {{-- <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script> --}}

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  {{-- <script src="{{ asset('js/todolist.js') }}"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  {{-- <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script> --}}
  {{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script> --}}
  <!-- End custom js for this page-->
  @stack('scripts')
  {{-- <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script> --}}
</body>

</html>

