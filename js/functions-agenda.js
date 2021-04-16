$( document ).ready(function(){

    $(".tipocoche").hide();

    $('#autos').on('click', function(){
        alert($(this).text());
    });    
});

function tipo(tipo){ 
    $.ajax({
        url: "TipoCoche.php",
        type: "post",
        data: { tipo: tipo },
        success: function (html) {
          document.getElementById("phpcoche").innerHTML = html;
        },
        complete: function (html) {
            $(".tipocoche").show();
            
        }
    });
}

function tipoAuto(tipo){
    
    var select = document.getElementById("autos");

    modelo = select.value;

    $.ajax({
        url: "TipoCoche.php",
        type: "post",
        data: { modelo: modelo, tipo: tipo },
        success: function (html) {
          document.getElementById("phpcoche").innerHTML = html;
        },
        complete: function (html) {
            select.value = tipo;
            document.getElementById("autos").value = modelo;
        }
    });
}