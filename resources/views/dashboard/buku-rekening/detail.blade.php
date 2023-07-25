@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Faktur Nasabah: {{ $nama }}</h4>
        <h5 class="card-description">
            Total Saldo: <strong>Rp {{ number_format($saldo,2,",",".") }}</strong>
        </h5>
        <div class="table-responsive">
            <table id="fakturs" class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Nominal</th>
                        <th>Jenis Transaksi</th>
                        <th>Status</th>
                        <th>Waktu Perubahan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($fakturs as $faktur)
                    <tr>
                        <td>{{ $faktur->created_at }}</td>
                        <td>Rp {{ number_format($faktur->nominal,2,",",".") }}</td>
                        <td>
                            @if($faktur->jenis_transaksi != 0 )
                            Pemasukan
                            @else
                            Pengeluaran
                            @endif
                        </td>
                        <td>
                            @if($faktur->status != 0)
                            <div class="badge badge-opacity-success">Selesai</div>
                            @else
                            <div class="badge badge-opacity-warning">Pending</div>
                            @endif
                        </td>
                        <td>{{ $faktur->updated_at }}</td>
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