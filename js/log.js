function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contra').val();

      let user = new Usuario();
      var log = user.login(usuario, contra);
      alert("log: " + log);
      if(log == 1){
          alert("registrado");
          //window.location.assign("Agendar.html");
      }else{
          alert("error");
      }
}