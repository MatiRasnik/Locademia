var log2;
var txt;
var Horas2;

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
  mat = sessionStorage.getItem('matricula');
  txt = tipocar;
  log2 = JSON.parse(txt);

  if(mat == null){
    location.href ="/locademia/Form/Login.html";
  }

  console.log(mat.length);
  if(mat.length <= 4){
    //no tiene auto
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

    autos = autos + "</select> \n <button onclick='guardoAutoAgenda()'>Seleccionar</button> \n </div> \n <div class='foto-vehiculo' id= 'foto-vehiculo'>";
    autos = autos + " \n <img src='../img/"+log2[0]["url"]+"' alt='' />";
    autos = autos + "\n </div> \n </div> \n <div class='vector-wrapper-rotate'> \n <img class='vector' src='../img/Main-Vector.svg' alt='' /> \n </div> ";

  }else{
    //tiene auto
    for (var i = 0; i < log2.length; i++) {
      if(log2[i]["matricula"] == mat){
        var coche = log2[i]["desc"];
        var imgAuto = log2[i]["url"];
      }
   }
    var autos = "  <div class='vector-wrapper'> \n <img class='vector' src='../img/Main-Vector.svg' alt='' /> \n </div> \n <div class='tipo-wrapper-grid'> \n <div class='tipo-wrapper'>\n  <h2>Su Vehiculo:</h2> \n  <p>" + coche + "</p>";
    autos = autos + " \n <button onclick='agenda()'>Seleccionar Horario</button> \n </div> \n <div class='foto-vehiculo' id= 'foto-vehiculo'>";
    autos = autos + " \n <img src='../img/"+imgAuto+"' alt='' />";
    autos = autos + "\n </div> \n </div> \n <div class='vector-wrapper-rotate'> \n <img class='vector' src='../img/Main-Vector.svg' alt='' /> \n </div> ";
  }
  
  document.getElementById("phpcoche").innerHTML = autos;
}

function fotoAuto(foto){
  foto2 = JSON.parse(txt); 
for (var i = 0; i < foto2.length; i++) {
  if(foto2[i]["desc"] == foto.value){
    img = "\n <img src='../img/"+foto2[i]["url"]+"' alt='' />"; 
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
  var Horas = horas;
  Horas2 = JSON.parse(Horas);
  $.ajax({
    url: "Reservas.php",
    type: "post",
    data: { Horas2:Horas2 },
    succes: function (html) {
      $(".horas").html(html);
    }
  })
}

function cerrarSesion(){
  $.ajax({
    async: false,
    type: "POST",
    url: "/locademia/Form/CerrarSesion.php",
    success: function(){
      sessionStorage.clear();
      location.href ="/locademia/index.html";
    }
});
 }

function agenda(){
  $("#agendadiv").show();
  document.getElementById("agendadiv").scrollIntoView();
}

function guardoAutoAgenda(){
  var auto = document.getElementById("autos").value;
  document.getElementById("autos").disabled = true;
  var ci = sessionStorage.getItem('ci');
  auto2 = JSON.parse(txt);
  for (var i = 0; i < auto2.length; i++) {
    if(auto2[i]["desc"] == auto){
      Auto = auto2[i]["matricula"]; 
    }
  }
      let car = new Coches();
      var guardoAuto = car.guardoCoche(ci, Auto);
      if(guardoAuto == 0){
        alert("Ocurrio un pronlema al registrar su coche");
      }else{
        $("#agendadiv").show();
        document.getElementById("agendadiv").scrollIntoView();
      }
}

function VerificoSesion(){
  const transition_el = document.querySelector('.transition');
        setTimeout(() => {
            transition_el.classList.remove('is-active');    
        }, 100);
  $.ajax({
    async: false,
    type: "POST",
    url: "/locademia/Form/VerificoSesion.php",
    success: function(asd){
      if(asd == 1){
      location.href ="/locademia/Form/Login.html";
      }
    }
});
}