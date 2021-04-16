function Register1(ci){
    $(':button').prop('disabled', true);
    $.ajax({
        url: "../Form/Register.php",
        type: "post",
        data: { ci: ci },
        success: function() {
        },
    });
}
function Register2(nombre,apellido,email,telefono,direccion,password){
    $(':button').prop('disabled', true);
    $.ajax({
        url: "../Form/Register.php",
        type: "post",
        data: {Nombre: nombre,Apellido: apellido,Email: email,Telefono: telefono,Direccion: direccion,Password: password},
        success: function() {
        },
    });
}
function correcto(){
    $.ajax({
        url: "../Form/Register2.html",
        type: "post",
        success: function() {
            alert("Su cedula a sido validada");
        },
    });
}
function correcto2(){
    $.ajax({
        url: "../Form/Login.html",
        type: "post",
        success: function() {
            alert("se guardaron sus datos");
        },
    });
}
function incorrecto(){
    $.ajax({
        url: "../Form/Register.html",
        type: "post",
        success: function() {
            alert("Su cedula es invalidada");
        },
    });
}
function incorrecto2(){
    $.ajax({
        url: "../Form/Register2.html",
        type: "post",
        success: function() {
            alert("a colocado un symbolo,numero o letra en un campo que no hiba");
        },
    });
}

