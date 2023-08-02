@extends('dashboard.layouts.main')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-sm-4">
        <div class="statistics-details d-flex align-items-center justify-content-between">
            <div>
                <p class="statistics-title">Saldo Rekening</p>
                <h3 class="rate-percentage">Rp {{ number_format($buku_rekening->saldo,2,",",".") }}</h3>
            </div>
            <div>
                <p class="statistics-title">Jumlah Transaksi</p>
                <h3 class="rate-percentage">{{ $jumlah_transaksi }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="card mb-2">
    <div class="card-body">
        <h4 class="card-title">Rekues Penarikan Saldo</h4>
        <p class="card-description">Request Penarikan Saldo pada Jadwal Penimbangan Berikutnya</p>
        <form action="{{ route('nasabah.buku-rekening.penarikan') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="saldo" class="col-md-auto">Nominal Penarikan :</label>
                <div class="col-sm-8">
                    <input type="number" name="nominal" class="form-control" id="saldo" min=10000 max={{ $buku_rekening->saldo }} placeholder="Masukan nominal yang ingin ditarik tanpa menulis Rupiah">
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-info" type="submit">Request Penarikan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Riwayat Transaksi</h4>
        <p class="card-description">
            List Faktur Anda
        </p>
        <div class="table-responsive">
            <table id="fakturs" class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi </th>
                        <th>Nominal</th>
                        <th>Jenis Transaksi</th>
                        <th>Status</th>
                        <th>Terakhir Diupdate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->created_at }}</td>
                        @if($transaksi->jenis_transaksi != 1)
                        <td><strong>-</strong> Rp {{ number_format($transaksi->nominal,2,",",".") }}</td>
                        <td class="text-danger">Penarikan Saldo</td>
                        @else
                        <td> Rp {{ number_format($transaksi->nominal,2,",",".") }}</td>
                        <td class="text-primary">Pemasukan Saldo</td>
                        @endif
                        <td>
                            @if($transaksi->status == 1)
                            <div class="badge badge-opacity-success">Berhasil</div>
                            @elseif($transaksi->status == 2)
                            <div class="badge badge-opacity-danger" style="background-color: #ffcccc">Ditolak</div>
                            @else
                            <div class="badge badge-opacity-warning">Pending</div>
                            @endif
                        </td>
                        <td>{{ $transaksi->updated_at }}</td>
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