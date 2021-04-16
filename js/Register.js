function Register1(ci){
    $(':button').prop('disabled', true);
    $.ajax({
        url: "Register.php",
        type: "post",
        data: { ci: ci },
        success: function() {
        },
    });
}
function Register2(nombre,apellido,email,telefono,direccion,password){
    $(':button').prop('disabled', true);
    $.ajax({
        url: "Register.php",
        type: "post",
        data: {Nombre: nombre,Apellido: apellido,Email: email,Telefono: telefono,Direccion: direccion,Password: password},
        success: function() {
        },
    });
}
function correcto(){
    $.ajax({
        url: "Register2.html",
        type: "post",
        success: function() {
            alert("Su cedula a sido validada");
        },
    });
}
function correcto2(){
    $.ajax({
        url: "Login.html",
        type: "post",
        success: function() {
            alert("se guardaron sus datos");
        },
    });
}
function incorrecto(){
    $.ajax({
        url: "Register.html",
        type: "post",
        success: function() {
            alert("Su cedula es invalidada");
        },
    });
}
function incorrecto2(){
    $.ajax({
        url: "Register2.html",
        type: "post",
        success: function() {
            alert("a colocado un symbolo,numero o letra en un campo que no hiba");
        },
    });
}

