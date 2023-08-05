$(document).ready(function () {
    $('#select-jenis-sampah').select2({
        placeholder: "Pilih Jenis Sampah...",
    });
    $("#select-jenis-sampah").val('').trigger('change');
    $('#select-user').select2({
        placeholder: "Pilih Petugas...",
    });
    $("#select-user").val('').trigger('change');

    // $("#select-jenis-sampah").change(function () {
    //     let control = $(this);

    //     let kilogram = $('#jumlah_kg').attr('value');
    //     let harga = control.find(':selected').data('harga');
    //     let totalHarga = harga * kilogram;
    //     $('#total_harga').val(totalHarga);
    //     $('#harga').text(rupiah(totalHarga));
    // });

    $("#select-user").change(function () {
        let control = $(this);

        let id = control.find(':selected').attr('value');
        console.log(id);
        $('#show-user').data("id", id);
    });

    $('body').on('click', '#show-user', function () {
        let id = $(this).data('id');
        if (id != 1) {
            $.get("/dashboard/penimbangan/penyetoran/" + id, function (data) {
                $('#userShowModal').modal('show');
                $('#nama').text(data.nama);
                $('#email').text(data.email);
                $('#no_telepon').text(data.no_telepon);
                $('#alamat').text(data.alamat);
            });
        }
    });
});

// const rupiah = (number)=>{
//     return new Intl.NumberFormat("id-ID", {
//       style: "currency",
//       currency: "IDR"
//     }).format(number);
//   }

$('#show-inventori-sampah').DataTable({
    responsive: true,
    dom: "ltp",
    lengthMenu: [5],
});