var Cedula;

function Register1(){
    var ci = $('#CI').val();
    $.ajax({
        url: "Register.php",
        type: "post",
        data: { ci: ci },
        success: function(asd) {
            alert(asd);
            switch(asd){
                case '1':
                    Cedula = ci;
                    alert("Su cedula a sido validada");
                    window.location.assign("Register2.html")
                break;
                case '2':
                    alert("Su cedula es invalidada");
                break;
                case '3':
                    alert("se guardaron sus datos");
                    window.location.assign("Login.html")
                break;
                case '4':
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
