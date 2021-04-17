<?php
date_default_timezone_set("America/Montevideo");
$hora = date("H", mktime(date("H")+2));

echo "<div class='Titulo'> <h1>Vespertino</h1> </div>";

for($i=14;$i<=19;$i++) {
    if(date("H", mktime($i)) < $hora) {
        echo "<label class='horario' style='background-color: lightgrey;'> <input type='checkbox' id='horario1' name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
    } else {
        echo "<label class='horario'> <input type='checkbox' id='horario1' name='horario1' value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
    }
}
?>
