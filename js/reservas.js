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
    for(var a=7;a<=12;a++) {
        console.log("1>" + a);
        console.log("arri>" + arri[0]);
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            console.log("2>" + a);
            console.log("arri>" + arri[0]);
            console.log("asd");
            document.getElementById(a).disabled = true;
            console.log("3>" + a);
            document.getElementById("H"+a).style.backgroundColor = "lightgrey";
            console.log("4>" + a);
        } else if(horaL <= a) {
            document.getElementById(a).disabled = false;
            document.getElementById("H"+a).style.backgroundColor = "white";
        }
    }
    for(var a=14;a<=19;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            document.getElementById(a).disabled = true;
            document.getElementById("H"+a).style.backgroundColor = "lightgrey";
        } else if(horaL <= a) {
            document.getElementById(a).disabled = false;
            document.getElementById("H"+a).style.backgroundColor = "white";
        }
    }
}
