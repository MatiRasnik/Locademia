var log2;
var txt;

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
  txt = tipocar;
  log2 = JSON.parse(txt);
  var tipo;
  if(log2[1]["tipo"] == "A"){
    tipo = "SEDAN";
  }else{
    if(log2[1]["tipo"] == "B"){
        tipo = "HATCHBACK";
    }else{
      tipo = "MINI";
    }
  }
 var autos = "  <div class='vector-wrapper'> \n <img class='vector' src='../img/Main-Vector.svg' alt='' /> \n </div> \n <div class='tipo-wrapper-grid'> \n <div class='tipo-wrapper'>\n  <h2>Seleccione el Modelo del Vehiculo:</h2> \n  <p>" + tipo + "</p> \n <select name='autos' id='autos' onchange=fotoAuto(this);>";
 for (var i = 0; i < log2.length; i++) {
  autos = autos + "  \n <option id='auto-select' value='"+log2[i]["desc"]+"'>"+log2[i]["desc"]+"</option> ";
}
  autos = autos + "</select> \n <button onclick='agenda()'>Seleccionar</button> \n </div> \n <div class='foto-vehiculo' id= 'foto-vehiculo'>";
  autos = autos + " \n <img src='../img/"+log2[0]["url"]+"' alt='' />";
  autos = autos + "\n </div> \n </div> \n <div class='vector-wrapper-rotate'> \n <img class='vector' src='../img/Main-Vector.svg' alt='' /> \n </div> ";
  document.getElementById("phpcoche").innerHTML = autos;
}

function fotoAuto(foto){
  log2 = JSON.parse(txt);
for (var i = 0; i < log2.length; i++) {
  if(log2[i]["desc"] == foto.value){
    img = "\n <img src='../img/"+log2[i]["url"]+"' alt='' />"; 
  }
}
document.getElementById("foto-vehiculo").innerHTML = img;
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
    console.log(log2[i]["dia"]);
    console.log(log2[i]["horaComienzo"]);
    console.log(log2[i]["horaFin"]);
  }
}
