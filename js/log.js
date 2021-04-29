function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contra').val();
    if(usuario == "" || contra == ""){
      alert("Debe completar todos los campos");
    }else{
      let user = new Usuario();
      var log = user.login(usuario, contra);
      if(log == 1){
        //location.href ="https://didesweb.com/";
      }else{
          alert("El usuario o contraseña que ingreso es incorrecto");
      }
    }
}