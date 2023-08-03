@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Riwayat Penimbangan Sampah</h4>
        <p class="card-description">
            Riwayat Transaksi penimbangan sampah
        </p>
        <div class="table-responsive">
            <table id="penyetoran" class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Jam</th>
                        <th>Jenis Sampah</th>
                        <th>Total Berat</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penyetorans as $penyetoran)
                    <tr>
                        <td>{{ $penyetoran->created_at->translatedFormat('d F Y') }}</td>
                        <td>{{ $penyetoran->created_at->toTimeString() }}</td>
                        <td>{{ $penyetoran->jenisSampah->nama_sampah }}</td>
                        <td>{{ $penyetoran->jumlah_kg }} Kg</td>
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
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.js">
</script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endsection