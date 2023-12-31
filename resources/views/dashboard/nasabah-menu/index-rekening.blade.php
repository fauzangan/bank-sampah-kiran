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

{{-- Symbol --}}
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
{{-- Symbol --}}
{{-- Alert --}}
@if(session()->has('errors'))
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div class="mx-2">
        {{ $error }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif
{{-- Alert --}}


<div class="card mb-2">
    <div class="card-body">
        <h4 class="card-title">Rekues Penarikan Saldo</h4>
        <p class="card-description">Request Penarikan Saldo pada Jadwal Penimbangan Berikutnya</p>
        <form action="{{ route('nasabah.buku-rekening.penarikan') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="saldo" class="col-md-auto">Nominal Penarikan :</label>
                <div class="col-sm-8">
                    <input type="number" name="nominal" class="form-control" id="saldo" min=10000 max={{$buku_rekening->saldo }} placeholder="Masukan nominal yang ingin ditarik tanpa menulis Rupiah">
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