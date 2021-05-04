function log(){
    var usuario=$('#usuario').val();
    var contra=$('#contra').val();
    if(usuario == "" || contra == ""){
      alert("Debe completar todos los campos");
    }else{
      let user = new Usuario();
      var log = user.login(usuario, contra);
      if(log == 1){
        location.href ="Agendar.html";
      }else{
          alert("El usuario o contraseña que ingreso es incorrecto");
      }
    }
}

function traigoCoches(){
        var cedula = sessionStorage.getItem('ci');
        let car = new Coches();
        var tipocar = car.autos(cedula);
        if(tipocar[0] == "asd"){
          alert("Hubo un error al cargar la informacion de la base de datos");
        }else{
          armoAutos(tipocar);
        }
}

function armoAutos(tipocar){
  alert("tomas manco");
//inner

}
