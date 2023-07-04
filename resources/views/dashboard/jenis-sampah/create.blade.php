@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Default form</h4>
      <p class="card-description">
        Basic form layout
      </p>
      <form class="forms-sample">
        @csrf
        <div class="form-group">
          <label for="nama_sampah">Nama Sampah</label>
          <input type="text" class="form-control" id="nama_sampah" placeholder="Nama jenis sampah..">
        </div>
        <div class="form-group">
          <label for="harga_penarikan_kg">Harga Penarikan/kg</label>
          <input type="number" class="form-control" id="harga_penarikan_kg" placeholder="Harga penarikan per kg..">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Harga Setoran/kg</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
      </form>
    </div>
  </div>
@endsection
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>