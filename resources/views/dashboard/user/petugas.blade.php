@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Petugas</h4>
        <p class="card-description">
            Daftar semua Petugas Bank Sampah Kiran
        </p>
        <div class="table-responsive">
            <table id="nasabah" class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugass as $petugas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $petugas->nama }}</td>
                        <td>{{ $petugas->email }}</td>
                        <td>{{ $petugas->alamat }}</td>
                        <td>{{ $petugas->no_telepon }}</td>
                        <td>
                            @if($petugas->isActive)
                            <div class="badge badge-opacity-success">Active</div>
                            @else
                            <div class="badge badge-opacity-danger" style="background-color: #ffcccc">Suspended</div>
                            @endif
                        </td>
                        <td>
                            @if($petugas->isActive)
                            <a class="btn btn-danger" href="#" style="padding: 0.5rem 0.5rem;"><i class="mdi mdi-account-off-outline"></i>Suspend</a>
                            @else
                            <a class="btn btn-success" href="#" style="padding: 0.5rem 0.5rem;"><i class="mdi mdi-account-check-outline"></i>Activate</a>
                            @endif
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