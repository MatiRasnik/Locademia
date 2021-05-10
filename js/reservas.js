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
        data: { dia: diaG, log2:log2 },
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
        } else if(horaL <= i) {
            document.getElementById(i).disabled = false;
            document.getElementById("H"+i).style.backgroundColor = "white";
        }
    }
    for(i=14;i<=19;i++) {
        if(i+1 < arri[0] || i-1 > arri[0] || i+1 < arri[1] || i-1 > arri[1]) {
            document.getElementById(i).disabled = true;
            document.getElementById("H"+i).style.backgroundColor = "lightgrey";
        } else if(horaL <= i) {
            document.getElementById(i).disabled = false;
            document.getElementById("H"+i).style.backgroundColor = "white";
        }
    }
}
