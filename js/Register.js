var Cedula;

function Register1(){
    var ci = $('#CI').val();
    $.ajax({
        url: "Register.php",
        type: "post",
        data: { ci: ci },
        success: function(asd) {
            switch(asd){
                case 1:
                    Cedula = ci;
                    $.ajax({
                        url: "Register2.html",
                        type: "post",
                        success: function() {
                            alert("Su cedula a sido validada");
                        },
                    });
                break;
                case 2:
                    alert("Su cedula es validada");
                break;
                case 3:
                    $.ajax({
                        url: "Login.html",
                        type: "post",
                        success: function() {
                            alert("se guardaron sus datos");
                        },
                    });
                break;
                case 4:
                    alert("este usuario ya existe");
                break;
            }
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
