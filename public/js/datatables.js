$('#general-table').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'Daftar Jenis Sampah',
      text: '<i class="mdi mdi-file-excel"></i> Excel',
      className: 'btn btn-success rounded-pill',
    },
    {
      extend: 'pdf',
      title: 'Daftar Jenis Sampah',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
    },
  ],
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  }
});

$('#jenis-sampah').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'Daftar Jenis Sampah',
      text: '<i class="mdi mdi-file-excel"></i> Excel',
      className: 'btn btn-success rounded-pill',
    },
    {
      extend: 'pdf',
      title: 'Daftar Jenis Sampah',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
    },
  ],
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  }
});

$('#penarikan').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'Daftar Penarikan Sampah',
      text: '<i class="mdi mdi-file-excel"></i> Excel',
      className: 'btn btn-success rounded-pill',
    },
    {
      extend: 'pdf',
      title: 'Daftar Penarikan Sampah',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
    },
  ],
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  },
  order: [[0, 'desc']]
});

$('#penyetoran').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'Daftar Penyetoran Sampah',
      text: '<i class="mdi mdi-file-excel"></i> Excel',
      className: 'btn btn-success rounded-pill',
    },
    {
      extend: 'pdf',
      title: 'Daftar Penyetoran Sampah',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
    },
  ],
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  },
  order: [[0, 'desc']]
});

$('#inventori-sampah').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'Daftar Inventori Sampah',
      text: '<i class="mdi mdi-file-excel"></i> Excel',
      className: 'btn btn-success rounded-pill',
    },
    {
      extend: 'pdf',
      title: 'Daftar Inventori Sampah',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
    },
  ],
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  },
});

$('#nasabah').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'Daftar Nasabah',
      text: '<i class="mdi mdi-file-excel"></i> Excel',
      className: 'btn btn-success rounded-pill',
    },
    {
      extend: 'pdf',
      title: 'Daftar Nasabah',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
    },
  ],
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  },
});

$('#fakturs').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'Daftar Faktur',
      text: '<i class="mdi mdi-file-excel"></i> Excel',
      className: 'btn btn-success rounded-pill',
    },
    {
      extend: 'pdf',
      title: 'Daftar Faktur',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
    },
  ],
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  },
  order: [[0, 'desc']]
});

$('#request-fakturs').DataTable({
  dom: "lrtip",
  language: {
    "search": "Cari:",
    "lengthMenu": "Menampilkan _MENU_ data",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "infoEmpty": "Menampilkan 0 dari 0 sampai 0 data",
    "zeroRecords": "Tidak ada request penarikan saldo",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  },
});

