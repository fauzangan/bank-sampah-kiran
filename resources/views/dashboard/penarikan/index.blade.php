@extends('dashboard.layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
      <div class="statistics-details d-flex align-items-center justify-content-between">
        <div>
          <p class="statistics-title">Total Transaksi Penarikan</p>
          <h3 class="rate-percentage">{{ $total_penarikan }}</h3>
          <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
        </div>
        <div>
          <p class="statistics-title">Total Kilogram Penarikan</p>
          <h3 class="rate-percentage">{{ $total_kg }} Kg</h3>
          <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
        </div>
        <div>
          <p class="statistics-title">Rata-rata Kilogram Penarikan</p>
          <h3 class="rate-percentage">{{ $avg_kg }} Kg</h3>
          <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
        </div>
        <div>
          <p class="statistics-title">Total Harga Penarikan</p>
          <h3 class="rate-percentage">Rp {{ $total_harga }}</h3>
          <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
        </div>
        <div class="d-none d-md-block">
          <p class="statistics-title">Rata-rata Harga Penarikan</p>
          <h3 class="rate-percentage">Rp {{ $avg_harga }}</h3>
          <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
        </div>
      </div>
    </div>
  </div> 
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Histori Penarikan</h4>
        <p class="card-description">
            Histori penarikan pada Nasabah
        </p>
        <div class="table-responsive">
            <table id="penarikan" class="table table-hover">
                <thead>
                    <tr>
                        <th>Waktu Transaksi</th>
                        <th>Jenis Sampah</th>
                        <th>Nasabah</th>
                        <th>Jumlah Kilogram</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penarikans as $penarikan)
                    <tr>
                        <td>{{ $penarikan->created_at }}</td>
                        <td>{{ $penarikan->jenisSampah->nama_sampah }}</td>
                        <td>{{ $penarikan->user->nama }}</td>
                        <td>{{ $penarikan->jumlah_kg }}</td>
                        <td>Rp {{ number_format($penarikan->total_harga,2,",",".") }}</td>
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
