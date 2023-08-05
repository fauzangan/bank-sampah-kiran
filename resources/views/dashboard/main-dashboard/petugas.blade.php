@extends('dashboard.layouts.main')
@section('content')
<div class="row justify-content-md-center">
    <div class="col-sm-8">
        <div class="statistics-details d-flex align-items-center justify-content-between">
            <div>
                <p class="statistics-title">Total Transansi Penimbangan</p>
                <h3 class="rate-percentage">{{ $totalTransaksi }}</h3>
            </div>
            <div>
                <p class="statistics-title">Berat Penimbangan Terendah</p>
                <h3 class="rate-percentage">{{ $minPenimbangan }} Kg</h3>
            </div>
            <div>
                <p class="statistics-title">Berat Penimbangan Terbesar</p>
                <h3 class="rate-percentage">{{ $maxPenimbangan }} Kg</h3>
            </div>
            <div>
                <p class="statistics-title">Rata-Rata Berat Penimbangan</p>
                <h3 class="rate-percentage">{{ $avgPenimbangan }} Kg</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 d-flex flex-column">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Laporan Penimbangan</h4>
                                <p class="card-subtitle card-subtitle-dash">Laporan penimbangan Anda tahun ini</p>
                            </div>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h2 class="me-2 fw-bold">Total: {{ $totalKgPenyetoran }} Kg</h2>
                            </div>
                        </div>
                        <div class="chartjs-bar-wrapper">
                            {!! $chartPenimbangan->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex flex-column">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title card-title-dash">Penimbangan Berdasarkan Jenis Sampah (Kg)</h4>
                        {!! $chartJenisSampah->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title card-title-dash">Jadwal Penimbangan Selanjutnya</h4>
                        <table id="show-jadwal-penimbangan" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwalPenimbangans as $jadwalPenimbangan)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($jadwalPenimbangan->tanggal)->translatedFormat('d F Y') }}
                                    </td>
                                    <td>{{ $jadwalPenimbangan->jam }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ $chartPenimbangan->cdn() }}"></script>
<script src="{{ $chartJenisSampah->cdn() }}"></script>

{{ $chartPenimbangan->script() }}
{{ $chartJenisSampah->script() }}
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.js">
</script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endsection