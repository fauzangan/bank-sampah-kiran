@extends('dashboard.layouts.main')
@section('content')
{{-- Symbol --}}
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
</svg>
{{-- Symbol --}}
{{-- Alert --}}
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div class="mx-2">
        {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
{{-- Alert --}}


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Request Penarikan Saldo</h4>
        <p class="card-description">
            Request Penarikan Saldo Nasabah
        </p>
        <div class="table-responsive">
            <table id="request-fakturs" class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Request Dibuat</th>
                        <th>Nasabah</th>
                        <th>Nominal</th>
                        <th>Jenis Transaksi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksiPending as $transaksi)
                    <tr>
                        <td>{{ $transaksi->created_at->translatedFormat('d F Y') }}</td>
                        <td>{{ $transaksi->bukuRekening->nasabah->nama }}</td>
                        @if($transaksi->jenis_transaksi != 1)
                        <td>Rp {{ number_format($transaksi->nominal,2,",",".") }}</td>
                        <td class="text-danger">Penarikan Saldo</td>
                        @else
                        <td> Rp {{ number_format($transaksi->nominal,2,",",".") }}</td>
                        <td class="text-primary">Pemasukan Saldo</td>
                        @endif
                        <td>
                            <div class="badge badge-opacity-warning">Pending</div>
                        </td>
                        <td>
                            <form method="POST" action="/dashboard/penarikan-saldo/{{ $transaksi->id_faktur }}/status"
                                class="d-inline-block">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value=1>
                                <button class="btn btn-success" style="padding: 0.5rem 0.5rem;">Terima</button>
                            </form>
                            <form method="POST" action="/dashboard/penarikan-saldo/{{ $transaksi->id_faktur }}/status"
                                class="d-inline-block">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value=2>
                                <button class="btn btn-danger" style="padding: 0.5rem 0.5rem;">Tolak</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Faktur</h4>
        <p class="card-description">
            Daftar Semua Faktur
        </p>
        <div class="table-responsive">
            <table id="fakturs" class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <th>Nasabah</th>
                        <th>Nominal</th>
                        <th>Jenis Transaksi</th>
                        <th>Status</th>
                        <th>Tanggal Diubah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksiSuccess as $transaksi)
                    <tr>
                        <td>{{ $transaksi->created_at->translatedFormat('d F Y') }}</td>
                        <td>{{ $transaksi->bukuRekening->nasabah->nama }}</td>
                        @if($transaksi->jenis_transaksi != 1)
                        <td>Rp {{ number_format($transaksi->nominal,2,",",".") }}</td>
                        <td class="text-danger">Penarikan Saldo</td>
                        @else
                        <td> Rp {{ number_format($transaksi->nominal,2,",",".") }}</td>
                        <td class="text-primary">Pemasukan Saldo</td>
                        @endif
                        <td>
                            @if($transaksi->status == 1)
                            <div class="badge badge-opacity-success">Selesai</div>
                            @else
                            <div class="badge badge-opacity-danger" style="background-color: #ffcccc">Ditolak</div>
                            @endif
                        </td>
                        <td>
                            {{ $transaksi->updated_at->translatedFormat('d F Y') }}
                        </td>
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