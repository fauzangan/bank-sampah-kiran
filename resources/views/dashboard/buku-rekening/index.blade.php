@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Buku Rekening Nasabah</h4>
        <p class="card-description">
            Jenis Sampah yang tersedia pada Bank Sampah Kiran
        </p>
        <div class="table-responsive">
            <table id="general-table" class="table table-hover">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Nasabah</th>
                        <th>Saldo</th>
                        <th>Total Transaksi</th>
                        <th>Waktu Terakhir Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buku_rekenings as $buku_rekening)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $buku_rekening->nasabah->nama }}</td>
                        <td>Rp {{ number_format($buku_rekening->saldo,2,",",".") }}</td>
                        <td>{{ $buku_rekening->total_transaksi_user }}</td>
                        <td>
                            @if($buku_rekening->total_transaksi_user > 0)
                            {{ $buku_rekening->updated_at->translatedFormat('d F Y') }}
                            @else
                            Belum melakukan transaksi
                            @endif
                        </td>
                        <td><a href="/dashboard/buku-rekening/{{ $buku_rekening->id_rekening }}" class="btn btn-info" style="padding: 0.5rem 0.5rem;"><i class="mdi mdi-file-find-outline"></i> Detail</a></td>
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