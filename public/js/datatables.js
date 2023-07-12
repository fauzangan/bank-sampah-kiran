$('#jenis-sampah').DataTable({
  dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
    "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  buttons: [
    {
      extend: 'excel',
      title: 'copy aja',
      className: 'btn btn-success',
    },
    {
      extend: 'pdf',
      title: 'pdf aja',
      className: 'btn btn-danger',
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
      title: 'copy aja',
      className: 'btn btn-success',
    },
    {
      extend: 'pdf',
      title: 'pdf aja',
      className: 'btn btn-danger',
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
      title: 'copy aja',
      className: 'btn btn-success',
    },
    {
      extend: 'pdf',
      title: 'pdf aja',
      className: 'btn btn-danger',
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
      title: 'copy aja',
      className: 'btn btn-success',
    },
    {
      extend: 'pdf',
      title: 'pdf aja',
      className: 'btn btn-danger',
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

