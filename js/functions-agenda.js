$( document ).ready(function(){

    $(".tipocoche").hide();
    $("#agendadiv").hide();
    $('#autos').on('click', function(){
        alert($(this).text());
    });
});

function tipo(tipo){
    var coche = document.getElementById("phpcoche");
    $.ajax({
        url: "TipoCoche.php",
        type: "post",
        data: { tipo: tipo },
        success: function (html) {
          coche.innerHTML = html;
        },
        complete: function (html) {
            $(".tipocoche").show();
            coche.scrollIntoView();
            
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
function agenda(){
    $("#agendadiv").show();
    document.getElementById("agendadiv").scrollIntoView();
}