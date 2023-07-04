@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h4 class="card-title">Jenis Sampah</h4>
            </div>
            <div class="col col-md-auto">
              <a href="{{ route('jenis-sampah.create') }}" class="btn btn-success"><span class="mdi mdi-plus"></span> Tambah Sampah</a>
          </div>
        </div>
      <p class="card-description">
        Jenis Sampah yang tersedia pada Bank Sampah Kiran
      </p>
      <div class="table-responsive">
        <table id="example" class="table table-hover">
          <thead>
            <tr>
              <th>Nama Sampah</th>
              <th>Harga Penarikan/kg</th>
              <th>Harga Setoran/kg</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($jenis as $jenis_sampah)
            <tr>
              <td>{{ $jenis_sampah->nama_sampah }}</td>
              <td>Rp. {{ $jenis_sampah->harga_penarikan_kg }}</td>
              <td>Rp. {{ $jenis_sampah->harga_setoran_kg }}</td>
              <td><a class="btn btn-warning" href="#">Edit</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.js"></script>
  <script src="{{ asset('js/datatables.js') }}"></script>
@endsection
