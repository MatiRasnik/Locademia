

function revisarHoras(dia) {
    $.ajax({
        url: "Reservas.php",
        type: "post",
        data: { dia:dia },
        success: function (html) {
          document.getElementById(".col2").innerHTML = html;
        },
    });
}


$( document ).ready(function() {
    $(".col2").load('Reservas.php');
});
