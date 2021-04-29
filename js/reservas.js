var diaG;
var arri = [];
var i;

function revisarHoras(fecha, dia, mes, año) {
    arri.length=0;
    diaG = fecha;
    console.log(fecha);
    $.ajax({
        url: "Reservas.php",
        type: "post",
        data: { fecha: fecha, dia: dia, mes: mes, año: año },
        success: function (html) {
            $(".horas").html(html);
        }
    });
}

function horasSeguidas(hrsel) {

    if(arri.indexOf(hrsel) == -1) {
        arri.push(hrsel);
    } else {
        arri.splice(arri.indexOf(hrsel), 1);
    }

    for(i=7;i<=12;i++) {
        if(i+1 < arri[0] || i-1 > arri[0] || i+1 < arri[1] || i-1 > arri[1]) {
            document.getElementById(i).disabled = true;
            document.getElementById("H"+i).style.backgroundColor = "lightgrey";
        } else {
            document.getElementById(i).disabled = false;
            document.getElementById("H"+i).style.backgroundColor = "white";
        }
    }
    for(i=14;i<=19;i++) {
        if(i+1 < arri[0] || i-1 > arri[0] || i+1 < arri[1] || i-1 > arri[1]) {
            document.getElementById(i).disabled = true;
            document.getElementById("H"+i).style.backgroundColor = "lightgrey";
        } else {
            document.getElementById(i).disabled = false;
            document.getElementById("H"+i).style.backgroundColor = "white";
        }
    }
}