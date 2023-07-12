$(document).ready(function () {
    $('#select-jenis-sampah').select2({
        placeholder: "Pilih Jenis Sampah...",
    });
    $("#select-jenis-sampah").val('').trigger('change');
    $('#select-user').select2({
        placeholder: "Pilih Petugas...",
    });
    $("#select-user").val('').trigger('change');

    $("#select-jenis-sampah").change(function () {
        let control = $(this);

        let kilogram = $('#jumlah_kg').attr('value');
        let harga = control.find(':selected').data('harga');
        let totalHarga = harga * kilogram;
        $('#total_harga').val(totalHarga);
        $('#harga').text(rupiah(totalHarga));
    });
});

const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }