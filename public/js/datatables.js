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
  },
  lengthMenu: [5, 10, 25, 50],
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
      exportOptions: {
        columns: [0, 1, 2, 3],
      },
    },
    {
      extend: 'pdf',
      title: 'Daftar Jenis Sampah',
      text: '<i class="mdi mdi-file-pdf"></i> PDF',
      className: 'btn btn-danger rounded-pill',
      exportOptions: {
        columns: [0, 1, 2, 3],
      },
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

$('#users').DataTable({
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
  lengthMenu: [5, 10, 25, 50],
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
  order: [[0, 'desc']],
  lengthMenu: [5, 10, 25, 50],
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
  lengthMenu: [5, 10, 25, 50],
});

$('#jadwal-penimbangan').DataTable({
  responsive: true,
  dom: "ltp",
  lengthMenu: [3, 5, 10, 12],
  order: [[0, 'desc']],
  language: {
    "lengthMenu": "Menampilkan _MENU_ data",
    "zeroRecords": "Jadwal Penimbangan Belum Dibuat",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  }

});

$('#show-jadwal-penimbangan').DataTable({
  responsive: true,
  dom: "tp",
  lengthMenu: [3, 5],
  order: [[0, 'asc']],
  language: {
    "lengthMenu": "Menampilkan _MENU_ data",
    "zeroRecords": "Tidak ada Jadwal Penimbangan",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
  }
});

