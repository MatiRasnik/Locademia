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
        
        alert(sessionStorage.getItem("ci"));
        let car = new Coches();
        var tipocar = car.traigoCoches(ci);
        if(tipocar !== null){
            $(".phpcoche").html(tipocar);
        }else{
            alert("A habido un error al cargar la informacion de la base de datos");
        }
}
