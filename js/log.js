function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contra').val();

      let user = new Usuario();
      if(user.login(usuario, contra)){
          alert("registrado");
          //window.location.assign("Agendar.html");
      }else{
          alert("error");
      }
}