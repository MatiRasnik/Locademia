$( document ).ready(function(){

    $(".tipocoche").hide();

    $('#autos').on('click', function(){
        alert($(this).text());
    });
    
});

function tipo(tipo, modelo){ 
    alert(tipo);
    alert(modelo);
    $.ajax({
        url: "TipoCoche.php",
        type: "post",
        data: { tipo: tipo, modelo: modelo },
        success: function (html) {
          document.getElementById("phpcoche").innerHTML = html;
        },
        complete: function (html) {
            $(".tipocoche").show();
        }
    });
}