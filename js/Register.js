function Register1(){
    var ci = $('#CI').val();
    sessionStorage.setItem("cedula", ci);
    $.ajax({
        url: "Register.php",
        type: "post",
        data: {ci: ci },
        success: function(respuesta) {
            if(respuesta == 1){
                alert("Su cedula a sido validada");
                window.location.assign("Register2.html")
            }else{
                if(respuesta == 2){
                    alert("Su cedula es invalida");
                    sessionStorage.clear();
                }else{
                    alert(respuesta);
                    sessionStorage.clear();
                }    
            }
        },
    });
}
function Register2(){
    var username = $('#usuario').val();
    var password = $('#password').val();
    var password2 = $('#password2').val();
    var Cedula = sessionStorage.getItem("cedula");
    if(password == password2){
        $.ajax({
            url: "Register.php",
            type: "post",
            data: {ci: Cedula, Usename: username, Password: password},
            success: function(respuesta) {
                if(respuesta == 3){
                    alert("se guardaron sus datos");
                    window.location.assign("Login.html")
                    sessionStorage.clear();
                }else{
                    if(respuesta == 4){
                        alert("este usuario ya existe");
                    }else{
                        alert(respuesta);
                    }
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
