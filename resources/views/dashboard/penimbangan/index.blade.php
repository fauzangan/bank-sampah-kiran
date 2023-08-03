@extends('dashboard.layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card text-center">
            <div class="card-header">
                Penarikan Sampah
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="icon-lg mdi mdi-bank-transfer-in"></i>
                </div>
                <p>Penarikan sampah berdasarkan jenis sampah yang tersedia yang dilakukan oleh Petugas bank sampah
                    terhadap Nasabah</p>
                <a class="btn btn-success mt-3 btn-lg" href="{{ route('penimbangan.penarikan') }}"
                    style="color: white">Lakukan Penarikan</a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card text-center">
            <div class="card-header">
                Penyetoran Sampah
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="icon-lg mdi mdi-bank-transfer-out"></i>
                </div>
                <p>Penyetoran sampah berdasarkan jenis sampah yang tersedia yang dilakukan oleh Petugas Yayasan bank
                    sampah terhadap bank sampah</p>
                <a class="btn btn-success mt-3 btn-lg" href="{{ route('penimbangan.penyetoran') }}"
                    style="color: white">Lakukan Penyetoran</a>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buat Jadwal Penimbangan</h4>
                <form action="{{ route('jadwal-penimbangan.store') }}" method="POST">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-auto">
                            <label for="">Pilih Tanggal: </label>
                            <input type="date" name="tanggal" min="{{ $minDateRange }}" required>
                        </div>
                        <div class="col-md-auto">
                            <label for="">Jam:</label>
                            <input type="time" name="jam" required>
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-info" type="submit">Buat Jadwal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Jadwal Penimbangan</h4>
                <div class="table-responsive">
                    <table id="jadwal-penimbangan" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwalPenimbangans as $jadwalPenimbangan)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($jadwalPenimbangan->tanggal)->translatedFormat('d F Y') }}
                                </td>
                                <td>{{ $jadwalPenimbangan->jam }}</td>
                                <td>
                                    @if($jadwalPenimbangan->status)
                                    <div class="badge badge-opacity-success">Selesai</div>
                                    @else
                                    <form
                                        action="{{ route('jadwal-penimbangan.status.update', $jadwalPenimbangan->id_jadwal_penimbangan) }}"
                                        method="POST" class="d-inline-block">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="status" value=1>
                                        <button class="btn btn-success" style="padding: 0.5rem 0.5rem;"><i
                                                class="mdi mdi-calendar-check"></i>Selesai</button>
                                    </form>
                                    <a href="javascript:void(0)" id="showJadwal"
                                        data-url="{{ route('jadwal-penimbangan.edit', $jadwalPenimbangan->id_jadwal_penimbangan) }}"
                                        class="btn btn-warning" style="padding: 0.5rem 0.5rem;"><i
                                            class="mdi mdi-square-edit-outline"></i>Edit</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Jadwal --}}
<div class="modal fade" id="editJadwalPenimbangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jadwal-penimbangan.update') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_jadwal_penimbangan" id="id_jadwal_penimbangan" value="">
                    <div class="row">
                        <div class="col-3">
                            <p><strong>Tanggal</strong></p>          
                        </div>
                        <div class="col-9">
                            : <input type="date" name="tanggal" id="tanggal" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p><strong>Jam</strong></p>
                        </div>
                        <div class="col-9">
                            : <input type="time" name="jam" id="jam" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Jadwal --}}


<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.js">
</script>
<script src="{{ asset('js/datatables.js') }}"></script>
<script>
    $(document).ready(function () {
    $('body').on('click', '#showJadwal', function () {
    var userURL = $(this).data('url');
    $.get(userURL, function (data) {
       $('#editJadwalPenimbangan').modal('show');
       $('#id_jadwal_penimbangan').val(data.id_jadwal_penimbangan);
       $('#tanggal').val(data.tanggal);
       $('#jam').val(data.jam);
   })
});
});
</script>
@endsection