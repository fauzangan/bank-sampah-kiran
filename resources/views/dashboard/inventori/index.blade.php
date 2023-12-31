@extends('dashboard.layouts.main')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-sm-4">
        <div class="statistics-details d-flex align-items-center justify-content-between">
            <div>
                <p class="statistics-title">Total Berat Sampah</p>
                <h3 class="rate-percentage">{{ $total_berat }} Kg</h3>
            </div>
            <div>
                <p class="statistics-title">Total Nilai Sampah</p>
                <h3 class="rate-percentage">Rp {{ $total_nilai }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Invetori Sampah</h4>
        <p class="card-description">
            Inventori Sampah Saat Ini
        </p>
        <div class="table-responsive">
            <table id="inventori-sampah" class="table table-hover">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Sampah</th>
                        <th>Total Repositori</th>
                        <th>Nilai Sampah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenis_sampahs as $jenis_sampah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jenis_sampah->nama_sampah }}</td>
                        <td>{{ $jenis_sampah->jumlah_kg }} Kg</td>
                        <td>Rp {{ number_format($jenis_sampah->nilai_sampah,2,",",".") }}</td>
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