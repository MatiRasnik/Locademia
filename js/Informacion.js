var diasAgendados = [];
var info = 1;
function borrar(dia,horai,horaf,ci,horas){
    $.ajax({
        url: "Borrar.php",
        type: "post",
        data: {dia:dia,horai:horai,horaf:horaf,ci:ci,horas:horas},
        success: function(respuesta) {
                window.location.reload()
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
function PDF(nombre,apellido,telefono,mail,direccion,horas_efectuadas,horas_reservadas,matricula,nombre_C,tipo,horas_restantes){
    $.ajax({
        url: "../PDF/vendor/armoPdf.php",
        type: "post",
        data: {nombre:nombre,apellido:apellido,telefono:telefono,mail:mail,direccion:direccion,horas_efectuadas:horas_efectuadas,horas_reservadas:horas_reservadas,matricula:matricula,tipo:tipo,nombre_C:nombre_C,horas_restantes:horas_restantes},
        success: function(data) {
        location.href ="../PDF/vendor/pdf.php";
        },
    });
}

$( document ).ready(function(){
    sessionStorage.getItem('ci');
    $("#Informacion").load('informacion.php');
});