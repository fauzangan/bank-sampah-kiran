$(document).ready(function () {
    setInterval(function () {
        $.ajax({
            url: "/read-loadcell",
            type: 'get',
            success: function (result) {
                let totalHarga;

                if (result['weight'] >= 0) {
                    $('#berat').text(result['weight']);
                    $('#jumlah_kg').val(result['weight']);
                } else {
                    $('#berat').text(0);
                    $('#jumlah_kg').val(0);
                }

                let kilogram = $('#jumlah_kg').attr('value');
                let harga = $('#select-jenis-sampah').find(':selected').data('harga');

                if (kilogram != null && harga != null) {
                    totalHarga = harga * kilogram;
                } else {
                    totalHarga = 0;
                }

                $('#total_harga').val(totalHarga);
                $('#harga').text(rupiah(totalHarga));
            }
        });
    }, 1000);
});

const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
    }).format(number);
}