@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Administrator</h4>
        <p class="card-description">
            Daftar semua Administrator Bank Sampah Kiran
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($administrators as $administrator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $administrator->nama }}</td>
                        <td>{{ $administrator->email }}</td>
                        <td>{{ $administrator->alamat }}</td>
                        <td>{{ $administrator->no_telepon }}</td>
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