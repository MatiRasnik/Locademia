<?php
if(isset($_POST['dia'])) {
    $arr = explode('-', $_POST['dia']);
}

date_default_timezone_set("America/Montevideo");

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$año = $_POST['año'];


$diaSemana=date("N",mktime(0,0,0,$mes,$dia,$año));

$dias = array(1=>'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
$meses = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre");

$hora = date("H", mktime(date("H")+2));

echo   "<h1>$dias[$diaSemana], $dia de $meses[$mes] de $año</h1>";

echo "<div class='col-grid'>
        <div class='col-flex'>
        <div class='col1'>
            <div class='Titulo'>
                <h1>Matutino</h1>
            </div>";

for($i=7;$i<=12;$i++) {
    if(date("H", mktime($i)) < $hora && date("j") >= $arr[0] && date("n") >= $arr[1] && date("Y") >= $arr[2]) {
        echo "<label class='horario' id='H" . $i . "' style='background-color: lightgrey;'> <input type='checkbox' id='horario1' name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
    } else {
        echo "<label class='horario' id='H" . $i . "'> <input type='checkbox' id=" . $i . " name='horario1' onchange='horasSeguidas(this.id)'> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
    }
}

echo "</div></div>";

echo "<div class='col-flex'> <div class='col2'> <div class='Titulo'> <h1>Vespertino</h1> </div>";

for($i=14;$i<=19;$i++) {
    if(date("H", mktime($i)) < $hora && date("j") >= $arr[0] && date("n") >= $arr[1] && date("Y") >= $arr[2]) {
        echo "<label class='horario' id='H" . $i . "' style='background-color: lightgrey; border: 1px solid lightgrey !important'> <input type='checkbox' id='horario1' name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
    } else {
        echo "<label class='horario' id='H" . $i . "'> <input type='checkbox' id=" . $i . " name='horario1' onchange='horasSeguidas(this.id)'> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
    }
}

echo "</div> </div> </div>"
?>