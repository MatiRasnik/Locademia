var log2;

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
        const transition_el = document.querySelector('.transition');
        setTimeout(() => {
            transition_el.classList.remove('is-active');    
        }, 100);

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
 //document.getElementById("phpcoche").innerHTML = tipocoche;
}

function traigoHorarios(){
  var matricula = sessionStorage.getItem('matricula');
  let car = new Coches();
  var horas = car.horariosCoches(matricula);
  if(horas[0] == "asd"){
    alert("asd");
  }else{
    armoHoras(horas);
  }
}

function armoHoras(horas){
  var txt = horas;
  log2 = JSON.parse(txt);
  $.ajax({
    url: "Reservas.php",
    type: "post",
    data: { log2:log2 },
    succes: function (html) {
      $(".horas").html(html);
    }
  })
  for (var i = 0; i < log2.length; i++) {
    console.log(log2[i]["id"]);
    console.log(log2[i]["ci"]);
    console.log(log2[i]["horaComienzo"]);
    console.log(log2[i]["horaFin"]);
  }
}
