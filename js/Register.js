var Cedula;

function Register1(){
    var ci = $('#CI').val();
    $.ajax({
        url: "Register.php",
        type: "post",
        data: { ci: ci },
        success: function(respuesta) {
            if(respuesta == 1){
                Cedula = ci;
                    alert("Su cedula a sido validada");
                    window.location.assign("Register2.html")
            }else{
                alert("Su cedula es invalida");
            }
        },
    });
}
function Register2(){
    var username = $('#usuario').val();
    var password = $('#password').val();
    var password2 = $('#password2').val();
    alert(Cedula);
    alert(username);
    alert(password);
    alert(password2);
    if(password == password2){
        $.ajax({
            url: "Register.php",
            type: "post",
            data: {CI: Cedula, Usename: username, Password: password},
            success: function(respuesta) {
                if(respuesta == 1){
                    alert("se guardaron sus datos");
                    window.location.assign("Login.html")
                }else{
                    alert("este usuario ya existe");
                }
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
