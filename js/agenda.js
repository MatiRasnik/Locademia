var diasAgendados = [];

function mesSiguiente(mes, año){
    mes++;

    $.ajax({
        url: "Agenda.php",
        type: "post",
        data: { mes: mes, año: año},
        success: function (html) {
          document.getElementById("Agenda").innerHTML = html;
        },
        complete: function (html) {
          for(var a = 0; a < diasAgendados.length; a++){
            if(document.getElementById(diasAgendados[a]) !== null){
              document.getElementById(diasAgendados[a]).classList.add("agendado");
            }
          }
        }
      });
}
function mesAnterior(mes, año){
    mes--;

    $.ajax({
        url: "Agenda.php",
        type: "post",
        data: { mes: mes, año: año},
        success: function (html) {
          document.getElementById("Agenda").innerHTML = html;
        },
        complete: function (html) {
          for(var a = 0; a < diasAgendados.length; a++){
            if(document.getElementById(diasAgendados[a]) !== null){
              document.getElementById(diasAgendados[a]).classList.add("agendado");
            }
          }
        }
      });
}
/*function dia(dia, mes, año){

    var iddia = "" + dia + mes + año;

    $.ajax({
        url: "agenda.php",
        type: "post",
        data: { dia: dia, mes: mes, año: año},
        success: function (html) {
          document.getElementById("agenda").innerHTML = html;
        },
        complete: function (html) {
          if(document.getElementById(iddia).classList.contains('agendado') == true){
            document.getElementById("mensaje").classList.remove("ocultado");
            $("#button-reservar").hide();
            $(".agenda-inputs").hide();
          }else{
            document.getElementById("mensaje").classList.add("ocultado");
            $(".agenda-inputs").show();
            $(".mensaje-agendado").hide();
            $("#button-reservar").show();
          }
        }
    });
}

function agendar(dia){
    if(document.getElementById(dia).classList.contains('diaActual') == true){
      document.getElementById(dia).classList.remove("diaActual");
      document.getElementById(dia).classList.add("agendado");
    }
    else if(document.getElementById(dia).classList.contains('agendado') == true){
      alert("Este día esta ocupado.");
    }else{
      diasAgendados.push(dia);
      document.getElementById(dia).classList.add("agendado");
    }

    console.log(diasAgendados);
    
}*/

$( document ).ready(function(){

    $("#Agenda").load('Agenda.php');
    
});