function borrar(dia,horai,horaf){
    $.ajax({
        url: "Borrar.php",
        type: "post",
        data: {dia:dia,horai:horai,horaf:horaf},
        success: function(respuesta) {
            alert(respuesta);
        },
    });
}



$( document ).ready(function(){
    sessionStorage.getItem('ci');
    console.log(sessionStorage.getItem('ci'))
    $("#Informacion").load('informacion.php');
    
});