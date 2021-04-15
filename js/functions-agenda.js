$( document ).ready(function(){

    $(".tipocoche").hide();
    
});

function tipo(tipo){
    $(".tipocoche").show();
    document.getElementById("tipocoche").innerHTML = tipo;
}