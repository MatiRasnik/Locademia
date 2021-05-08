var diaG;
var arri = [];
var i;
var horaL;

function revisarHoras(id, hora) {
    horaL = hora;
    arri.length=0;
    diaG = id;
    $.ajax({
        url: "Reservas.php",
        type: "post",
        data: { dia: diaG },
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
            for(var j=0;j<log2.length;j++) {
                if(log2[j]["horaComienzo"].slice(0, 2) == i || log2[j]["horaFin"].slice(0, 2) == i ) {
                    document.getElementById("H"+i).style.backgroundColor = "red";
                } else {
                    document.getElementById("H"+i).style.backgroundColor = "lightgrey";
                }
            }
        } else if(horaL <= i) {
            document.getElementById(i).disabled = false;
            document.getElementById("H"+i).style.backgroundColor = "white";
        }
    }
    for(i=14;i<=19;i++) {
        if(i+1 < arri[0] || i-1 > arri[0] || i+1 < arri[1] || i-1 > arri[1]) {
            document.getElementById(i).disabled = true;
            for(var j=0;j<log2.length;j++) {
                if(log2[j]["horaComienzo"].slice(0, 2) == i || log2[j]["horaFin"].slice(0, 2) == i ) {
                    document.getElementById("H"+i).style.backgroundColor = "red";
                } else {
                    document.getElementById("H"+i).style.backgroundColor = "lightgrey";
                }
            }
        } else if(horaL <= i) {
            document.getElementById(i).disabled = false;
            document.getElementById("H"+i).style.backgroundColor = "white";
        }
    }
}
