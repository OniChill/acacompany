document.getElementById('price').style.display="none";
$("#labeldiskon").html("$ "+$("#diskon").val());
$("#label_sub_total_price").html("$ "+$("#sub_total_price").val());
$(document).ready(function () {
$('#country').on('change', function () {
let id = $(this).val();
$.ajax({
type: 'GET',
url: 'onkir/' + id,
success: function (response) {
var response = JSON.parse(response);  

response.forEach(element => {
    onkirawal = element.onkir;
    jumlahqty = $("#quantity").val();
    total = parseInt(onkirawal)*parseInt(jumlahqty);
    sub_total = $("#sub_total_price").val();
    total_akhir = parseInt(sub_total)+parseInt(total);
    $('#onkir').val(total);
    $("#labelshipping").html("$ "+$("#onkir").val());
    $('#price').val(total_akhir);
    $("#labelprice").html("$ "+$("#price").val());

    });
}
});
});
});
