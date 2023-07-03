$('#example').DataTable({
    dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>" +
                  "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: [
      {
        extend: 'copy',
        title: 'copy aja',
        className: 'btn btn-warning',
      },
      {
        extend: 'pdf',
        title: 'pdf aja',
        className: 'btn btn-success',
      },
  ]
  });