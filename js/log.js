function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contra').val();

   /* if(usuario != "" && contra !=""){
        $.ajax({
            url: "logearse.php",
            type: "post",
            data: {usuario:usuario, contra:contra},
            success: function (log) {
                alert("log: " + log);
                if(log == 1){
                    alert("funca");
                   // window.location.assign("Agendar.html");
                }else{
                    alert("El usuario o contraseña es incorrecto");
                } 
            }
        });

    }else{
        alert("Debe completar todos los campos");
      }*/
      alert(usuario);
      alert(contra);
      let user = new Usuario();
      if(user.login(usuario, contra)){
          alert("registrado");
        //window.location.assign("Agendar.html");
      }else{
          alert("error");
      }
}