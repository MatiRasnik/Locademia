function borrar(dia,horai,horaf,ci){
    $.ajax({
        url: "Borrar.php",
        type: "post",
        data: {dia:dia,horai:horai,horaf:horaf,ci:ci},
        success: function(respuesta) {
            if(respuesta == 1){
                alert("se borro corectamente")
            }else{
                if(respuesta == 2){
                    alert("no se pudo borrar")
                }else{
                    alert("hubo un error")
                }
            }
        },
    });
}



$( document ).ready(function(){
    sessionStorage.getItem('ci');
    $("#Informacion").load('informacion.php');
});