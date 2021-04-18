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
                alert("Su cedula es invalidada");
            }
        },
    });
}
function Register2(){
    var username = $('#usuario').val();
    var password = $('#password').val();
    var password2 = $('#password2').val();
    alert(Cedula);
    if(password == password2){
        $.ajax({
            url: "Register.php",
            type: "post",
            data: {CI: Cedula, Usename: username, Password: username},
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
