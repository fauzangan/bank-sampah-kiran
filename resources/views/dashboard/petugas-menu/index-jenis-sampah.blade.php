@extends('dashboard.layouts.main')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h4 class="card-title">Jenis Sampah Yang Tersedia</h4>
      </div>
    </div>
    <div class="table-responsive">
      <table id="jenis-sampah" class="table table-hover">
        <thead>
          <tr>
            <th>No. </th>
            <th>Nama Sampah</th>
            <th>Harga Sampah/kg</th>
            <th>Terakhir Diubah</th>
          </tr>
        </thead>
        <tbody>
          @foreach($jenisSampah as $jenis_sampah)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jenis_sampah->nama_sampah }}</td>
            <td>Rp {{ number_format($jenis_sampah->harga_setoran_kg,2,",",".") }}</td>
            <td>{{ Carbon\Carbon::parse($jenis_sampah->updated_at)->translatedFormat('d F Y') }}</td>
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
<script
  src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.js">
</script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endsection