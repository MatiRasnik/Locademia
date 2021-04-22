function login(){
    var usuario=$('#usuario').val();
    var contra=$('#contra').val();
    $.ajax({
        url: "../servidor.php",
        type: "post",
        data: {usuario:usuario, contra:contra},
        success: function (log) {
            if(log == 1){
                //ir a agenda
            }else{
                alert("El usuario o contraseña es incorrecto");
            }
           
        }
    });
}