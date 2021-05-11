var diaG;
var arri = [];
var horaRes;
var horaL;

function revisarHoras(id, hora) {
    horaL = hora;
    arri.length=0;
    diaG = id;
    $.ajax({
        url: "Reservas.php",
        type: "post",
        data: { dia: diaG, Horas2:Horas2 },
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

    var oReq = new XMLHttpRequest();
    oReq.onload = function() {
        horaRes = this.responseText;
    };
    oReq.open("get", "Reservas.php", true);
    oReq.send();
    console.log(horaRes);
    for(var a=7;a<=12;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            document.getElementById(a).disabled = true;
            document.getElementById("H"+a).style.backgroundColor = "lightgrey";
        } else if(horaRes.indexOf(a) != -1) {
            document.getElementById(a).disabled = true;
            document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
        } else if(horaL <= a) {
            document.getElementById(a).disabled = false;
            document.getElementById("H"+a).style.backgroundColor = "white";
        }
    }
    for(var a=14;a<=19;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            document.getElementById(a).disabled = true;
            document.getElementById("H"+a).style.backgroundColor = "lightgrey";
        } else if(horaRes.indexOf(a) != -1) {
            document.getElementById(a).disabled = true;
            document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
        } else if(horaL <= a) {
            document.getElementById(a).disabled = false;
            document.getElementById("H"+a).style.backgroundColor = "white";
        }
    }
}
