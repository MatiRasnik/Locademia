var diaG;
var arri = [];
var horaL;
var asd2;

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
            hrReservadas();
        }
    });
}

function hrReservadas() {
    console.log("LOG= " + Horas2.length);
    console.log("H= " + Horas2[0]['dia']);
    console.log(diaG);
    $.ajax({
        url: "hrReser.php", 
        type: "post",
        data: { Horas2:Horas2, dia:diaG},
        success: function (asd) {
            console.log("RESULTADO = " +asd);
            var txt = asd;
            asd2 = JSON.parse(txt);
            console.log(asd2);
        }
    });
}

function horasSeguidas(hrsel) {
    if(arri.indexOf(hrsel) == -1) {
        arri.push(hrsel);
    } else {
        arri.splice(arri.indexOf(hrsel), 1);
    }
    for(var a=7;a<=12;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            document.getElementById(a).disabled = true;
            document.getElementById("H"+a).style.backgroundColor = "lightgrey";
        } else if(asd2.indexOf(a) != -1) {
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
        } else if(asd2.indexOf(a) != -1) {
            document.getElementById(a).disabled = true;
            document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
        } else if(horaL <= a) {
            document.getElementById(a).disabled = false;
            document.getElementById("H"+a).style.backgroundColor = "white";
        }
    }
}
