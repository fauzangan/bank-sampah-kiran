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
        <div class="row">
            <div class="col">
                <h4 class="card-title">Petugas</h4>
            </div>
            <div class="col col-md-auto">
                <a href="{{ route('user.petugas.create') }}" class="btn btn-success"><span class="mdi mdi-plus"></span> Tambah
                    Petugas</a>
            </div>
        </div>
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
                        @if($petugas->alamat != null)
                        <td>{{ $petugas->alamat }}</td>
                        @else
                        <td>-</td>
                        @endif
                        @if($petugas->no_telepon != null)
                        <td>{{ $petugas->no_telepon }}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>
                            @if($petugas->isActive)
                            <div class="badge badge-opacity-success">Active</div>
                            @else
                            <div class="badge badge-opacity-danger" style="background-color: #ffcccc">Suspended</div>
                            @endif
                        </td>
                        <td>
                            @if($petugas->isActive)
                            <form action="/dashboard/pengguna/{{ $petugas->id_user }}/status" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="isActive" value=0>
                                <button class="btn btn-danger" style="padding: 0.5rem 0.5rem;"><i class="mdi mdi-account-off-outline"></i>Suspend</button>
                            </form>
                            @else
                            <form action="/dashboard/pengguna/{{ $petugas->id_user }}/status" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="isActive" value=1>
                                <button class="btn btn-success" style="padding: 0.5rem 0.5rem;"><i class="mdi mdi-account-check-outline"></i>Activate</button>
                            </form>
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