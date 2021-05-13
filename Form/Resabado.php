<?php
if(isset($_POST['dia'])) {
    $arr = explode('-', $_POST['dia']);
} else {
    echo "error1";
}
if(isset($_POST['Horas2'])) {
    $log2 = $_POST['Horas2'];
} else {
    echo "error2";
}


date_default_timezone_set("America/Montevideo");

$norep = null;

$diaSemana=date("N",mktime(0,0,0,$arr[1],$arr[0],$arr[2]));

$dias = array(1=>'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
$meses = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre");

$hora = date("H", mktime(date("H")+2));

$horas = [];
if(isset($log2)) {
    for($h=0;$h<count($log2);$h++) {
        $diaRes = explode('-', $log2[$h]["dia"]);
        if($diaRes[2] == $arr[0] && $diaRes[1] == $arr[1] && $diaRes[0] == $arr[2]) {
            array_push($horas, $h);
        }
    }
} else {
}

echo   "<h1>" . $dias[$diaSemana] . ", " . $arr[0] . " de " . $meses[$arr[1]] . " de " . $arr[2] . "</h1>";

echo "<div class='col-grid'>
        <div class='col-flex'>
        <div class='col1'>
            <div class='Titulo'>
                <h1>Matutino</h1>
            </div>";
if(isset($log2)){
    for($i=7;$i<=10;$i++) {
        if(date("H", mktime($i)) < $hora && date("j") >= $arr[0] && date("n") >= $arr[1] && date("Y") >= $arr[2] || $hora < 3) {
            for($j=0;$j<count($horas);$j++) {
                if($log2[$horas[$j]]["horaComienzo"] == $i || $log2[$horas[$j]]["horaComienzo"] == $i) {
                    echo "<label class='horario' id='H" . $i . "' style='background-color: #db5e5e; color: white'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
                    $norep = $i;
                }
            }
            if($norep != $i) {
                echo "<label class='horario' id='H" . $i . "' style='background-color: lightgrey;'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
            }
        } else {
            for($j=0;$j<count($horas);$j++) {
                if($log2[$horas[$j]]["horaComienzo"] == $i || $log2[$horas[$j]]["horaComienzo"] == $i) {
                    echo "<label class='horario' id='H" . $i . "' style='background-color: #db5e5e; color: white'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
                    $norep = $i;
                }
            }
            if($norep != $i) {
                echo "<label class='horario' id='H" . $i . "'> <input type='checkbox' id=" . $i . " name='horario1' onchange='horasSeguidas(" . $i . ")'> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
            }
        }
    }
}else{
    for($i=7;$i<=10;$i++) {
        if(date("H", mktime($i)) < $hora && date("j") >= $arr[0] && date("n") >= $arr[1] && date("Y") >= $arr[2] || $hora < 3) {
                    echo "<label class='horario' id='H" . $i . "' style='background-color: lightgrey;'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
        } else {
            echo "<label class='horario' id='H" . $i . "'> <input type='checkbox' id=" . $i . " name='horario1' onchange='horasSeguidas(" . $i . ")'> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
        }
    }
}


echo "</div></div>";

echo "<form action='../servidor.php'> <div class='col-flex'> <div class='col2'> <div class='Titulo'> <h1>Vespertino</h1> </div>";

if(isset($log2)){
    for($i=11;$i<=13;$i++) {
        if(date("H", mktime($i)) < $hora && date("j") >= $arr[0] && date("n") >= $arr[1] && date("Y") >= $arr[2] || $hora < 3) {
            for($j=0;$j<count($horas);$j++) {
                if($log2[$horas[$j]]["horaComienzo"] == $i || $log2[$horas[$j]]["horaComienzo"] == $i) {
                    echo "<label class='horario' id='H" . $i . "' style='background-color: #db5e5e; color: white'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
                    $norep = $i;
                }
            }
            if($norep != $i) {
                echo "<label class='horario' id='H" . $i . "' style='background-color: lightgrey;'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
            }
        } else {
            for($j=0;$j<count($horas);$j++) {
                if($log2[$horas[$j]]["horaComienzo"] == $i || $log2[$horas[$j]]["horaComienzo"] == $i) {
                    echo "<label class='horario' id='H" . $i . "' style='background-color: #db5e5e; color: white'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
                    $norep = $i;
                }
            }
            if($norep != $i) {
                echo "<label class='horario' id='H" . $i . "'> <input type='checkbox' id=" . $i . " name='horario1' onchange='horasSeguidas(" . $i . ")'> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
            }
        }
    }
}else{
    for($i=11;$i<=13;$i++) {
        if(date("H", mktime($i)) < $hora && date("j") >= $arr[0] && date("n") >= $arr[1] && date("Y") >= $arr[2] || $hora < 3) {
                    echo "<label class='horario' id='H" . $i . "' style='background-color: lightgrey;'> <input type='checkbox' id=" . $i . " name='horario1' disabled value=" . date('H:i', mktime($i, 00)) . "> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
        } else {
            echo "<label class='horario' id='H" . $i . "'> <input type='checkbox' id=" . $i . " name='horario1' onchange='horasSeguidas(" . $i . ")'> <label>" . date('H:i', mktime($i, 00)) . " hs </label> </label>";
        }
    }
}
echo "</div> </div> </div> <div style='width: 100%;'> <div style='width: 100%;'> <label for='opc1'>Diario</label> <input type='radio' id='opc1' name='opciones'> <label for='opc2'>Semanal</label> <input type='radio' id='opc2' name='opciones'> <label for='opc3'>Personalizado</label> <input type='radio' id='opc3' name='opciones'> </div> <div style='width: 100%;'> <input class='button-info' type='submit' value='Enviar'> </div> </form> </div>";
?>
