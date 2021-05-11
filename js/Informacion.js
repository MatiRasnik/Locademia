var diasAgendados = [];
var info = 1;
function borrar(dia,horai,horaf,ci){
    $.ajax({
        url: "Borrar.php",
        type: "post",
        data: {dia:dia,horai:horai,horaf:horaf,ci:ci},
        success: function(respuesta) {
            if(respuesta == 1){
                alert("se borro corectamente")
                window.location.reload()
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
function CargarCalendario(dias){
    $.ajax({
        url: "Agenda.php",
        type: "post",
        data: {info:info, diasinfo:dias},
        success: function(calendario) {
            document.getElementById("calendario").innerHTML=calendario;
        },
    });
}
function mesSiguiente(mes, año, dias){
    mes++;

    $.ajax({
        url: "Agenda.php",
        type: "post",
        data: { mes: mes, año: año, info:info, diasinfo:dias},
        success: function (calendario) {
            document.getElementById("calendario").innerHTML = calendario;
        },
        complete: function (calendario) {
            for(var a = 0; a < diasAgendados.length; a++){
                if(document.getElementById(diasAgendados[a]) !== null){
                    document.getElementById(diasAgendados[a]).classList.add("agendado");
                }
            }
        }
    });
}
function mesAnterior(mes, año, dias){
    mes--;

    $.ajax({
        url: "Agenda.php",
        type: "post",
        data: { mes: mes, año: año, info:info, diasinfo:dias}, 
        success: function (calendario) {
            document.getElementById("calendario").innerHTML = calendario;
        },
        complete: function (calendario) {
            for(var a = 0; a < diasAgendados.length; a++){
                if(document.getElementById(diasAgendados[a]) !== null){
                    document.getElementById(diasAgendados[a]).classList.add("agendado");
                }
            }
        }
    });
}


$( document ).ready(function(){
    sessionStorage.getItem('ci');
    $("#Informacion").load('informacion.php');
});