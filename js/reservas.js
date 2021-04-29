var diaG;
var arri = [];
var i;

function revisarHoras(dia) {
    arri.length=0;
    diaG = dia;
    console.log(dia);
    $.ajax({
        url: "Reservas.php",
        type: "post",
        data: { dia:dia },
        success: function (html) {
            $(".col2").html(html);
        },
    });
}

function horasSeguidas(hrsel) {

    if(arri.indexOf(hrsel) == -1) {
        arri.push(hrsel);
    } else {
        arri.splice(arri.indexOf(hrsel), 1);
    }

    for(i=14;i<=19;i++) {
        if(i+1 < arri[0] || i-1 > arri[0] || i+1 < arri[1] || i-1 > arri[1]) {
            document.getElementById(i).disabled = true;
            document.getElementById("V"+i).style.backgroundColor = "lightgrey";
        } else {
            document.getElementById(i).disabled = false;
            document.getElementById("V"+i).style.backgroundColor = "white";
        }
    }
}