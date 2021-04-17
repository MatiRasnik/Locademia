var Cedula;

function Register1(){
    var ci = $('#CI').val();
    $.ajax({
        url: "Register.php",
        type: "post",
        data: { ci: ci },
        success: function() {
        },
    });
}
function Register2(){
    var username = $('#usuario').val();
    var password = $('#password').val();
    var password2 = $('#password2').val();
    if(password == password2){
        $.ajax({
            url: "Register.php",
            type: "post",
            data: {CI: Cedula, Usename: username, Password: username},
            success: function() {
            },
        });
    }else{
        $.ajax({
            url: "Register2.html",
            type: "post",
            success: function() {
                alert("Las contraseñas que a colocado son distintas");
            },
        });
    }
}
function correcto(CI){
    Cedula = CI;
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
            alert("ya se a registrado este usuario");
        },
    });
}

