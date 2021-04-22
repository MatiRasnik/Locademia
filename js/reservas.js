function revisarHoras(dia) {
    console.log(dia);
    $.ajax({
        url: "Reservas.php",
        type: "post",
        data: { dia:dia },
        success: function (html) {
            $(".col2").html(html);
        },
    });
}

//  function horasSeguidas(hrsel) {
//      $.ajax({
//          url: "Reservas.php",
//          type: "post",
//          data: {hrsel:hrsel},
//          success: function (html) {
//              $(".col2").html(html);
//          },
//      });
//  }

//  $( document ).ready(function() {
//        $(".col2").load('Reservas.php');
//  });
