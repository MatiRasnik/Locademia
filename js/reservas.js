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
    $.ajax({
        url: "hrReser.php", 
        type: "post",
        data: { Horas2:Horas2, dia:diaG},
        success: function (asd) {
            var txt = asd;
            asd2 = JSON.parse(txt);
        }
    });
}

function horasSeguidas(hrsel) {
    if(arri.indexOf(hrsel) == -1) {
        arri.push(hrsel);
    } else {
        arri.splice(arri.indexOf(hrsel), 1);
    }

    var reser = [];
    if(asd2.length !== 0) {
        for(var i=0;i<asd2.length;i++) {
            reser.push(parseInt(asd2[i]));
        }
    } else {
        reser.push(0);
    }

    for(var a=7;a<=12;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "lightgrey";
            }
        } else if(horaL <= a) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = false;
                document.getElementById("H"+a).style.backgroundColor = "white";
            }
        }
    }
    for(var a=14;a<=19;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "lightgrey";
            }
        } else if(horaL <= a) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = false;
                document.getElementById("H"+a).style.backgroundColor = "white";
            }
        }
    }
}

function revisarSabado(id, hora) {
    horaL = hora;
    arri.length=0;
    diaG = id;
    $.ajax({
        url: "Resabado.php",
        type: "post",
        data: { dia: diaG, Horas2:Horas2 },
        success: function (html) {
            $(".horas").html(html);
            hrReservadas();
        }
    });
}

function horasSabado(hrsel) {
    if(arri.indexOf(hrsel) == -1) {
        arri.push(hrsel);
    } else {
        arri.splice(arri.indexOf(hrsel), 1);
    }

    var reser = [];
    for(var i=0;i<asd2.length;i++) {
        reser.push(parseInt(asd2[i]));
    }

    for(var a=7;a<=10;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "lightgrey";
            }
        } else if(horaL <= a) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = false;
                document.getElementById("H"+a).style.backgroundColor = "white";
            }
        }
    }
    for(var a=11;a<=13;a++) {
        if(a+1 < arri[0] || a-1 > arri[0] || a+1 < arri[1] || a-1 > arri[1]) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "lightgrey";
            }
        } else if(horaL <= a) {
            if(reser.indexOf(a) != -1) {
                document.getElementById(a).disabled = true;
                document.getElementById("H"+a).style.backgroundColor = "#db5e5e";
            } else {
                document.getElementById(a).disabled = false;
                document.getElementById("H"+a).style.backgroundColor = "white";
            }
        }
    }
}

function ABD() {
    var tipo = $('input:radio[name=opciones]:checked').val();
    if(tipo !== undefined){
        $.ajax({
            url: "resaBD.php",
            type: "post",
            data: { diaG:diaG, tipo:tipo, arri:arri },
            success: function() {
                alert('Sus reservas fueron realizadas\n Pase por Informaci??n para ver sus reservas');
            }
        })
    }else{
        alert('Debe seleccionar una de las opciones de reserva');
    }
   
}
