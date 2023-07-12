@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Histori Penyetoran</h4>
        <p class="card-description">
            Histori penyetoran pada Bank Sampah
        </p>
        <div class="table-responsive">
            <table id="penyetoran" class="table table-hover">
                <thead>
                    <tr>
                        <th>Waktu Transaksi</th>
                        <th>Jenis Sampah</th>
                        <th>Petugas Yayasan</th>
                        <th>Jumlah Kilogram</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penyetorans as $penyetoran)
                    <tr>
                        <td>{{ $penyetoran->created_at }}</td>
                        <td>{{ $penyetoran->jenisSampah->nama_sampah }}</td>
                        <td>{{ $penyetoran->user->nama }}</td>
                        <td>{{ $penyetoran->jumlah_kg }}</td>
                        <td>Rp {{ number_format($penyetoran->total_harga,2,",",".") }}</td>
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