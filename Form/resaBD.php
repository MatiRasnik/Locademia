<?php
include '../servidor.php';
$server= new servidor();
session_start();
$ci = $_SESSION['ci'];
$matricula = $_SESSION['matricula'];
list($horas_efectuadas, $horas_contratadas) = $server->Contrato($ci);
$horas_restantes = $horas_contratadas - $horas_efectuadas;
$h = 0;
$i = 0;
if(isset($_POST['arri']) && isset($_POST['diaG']) && isset($_POST['tipo'])) {
    $irra = $_POST['arri'];
    $revers = explode('-', $_POST['diaG']);
    if($_POST['tipo'] == 'opc1') {
        while($i<$horas_restantes) {
            $dia = date('Y-m-d', mktime(0, 0, 0, $revers[1], $revers[0]+$h, $revers[2]));
            sort($irra, SORT_NATURAL);
            if(date('N', mktime(0, 0, 0, $revers[1], $revers[0]+$h, $revers[2])) != 6) {
                for($j=0;$j<count($irra);$j++) {
                    $hora_inicio = date('H:i:s', mktime($irra[$j], 0, 0));
                    $hora_fin = date('H:i:s', mktime($irra[$j]+1, 0, 0));
                    $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
                    $horas_efectuadas++;
                    $i++;
                }
            } else if($irra[0] < 13 && $irra[1] < 13) {
                for($j=0;$j<count($irra);$j++) {
                    $hora_inicio = date('H:i:s', mktime($irra[$j], 0, 0));
                    $hora_fin = date('H:i:s', mktime($irra[$j]+1, 0, 0));
                    $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
                    $horas_efectuadas++;
                    $i++;
                }
            }
            $h++;
        }
        $server->Horas($horas_efectuadas, $ci);
    } else if($_POST['tipo'] == 'opc2') {
        while($i<$horas_restantes) {
            $dia = date('Y-m-d', mktime(0, 0, 0, $revers[1], $revers[0]+$i*7, $revers[2]));
            sort($irra, SORT_NATURAL);
            if(date('N', mktime(0, 0, 0, $revers[1], $revers[0]+$h, $revers[2])) != 6) {
                for($j=0;$j<count($irra);$j++) {
                    $hora_inicio = date('H:i:s', mktime($irra[$j], 0, 0));
                    $hora_fin = date('H:i:s', mktime($irra[$j]+1, 0, 0));
                    $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
                    $horas_efectuadas++;
                    $i++;
                }
            } else if($irra[0] < 13 && $irra[1] < 13) {
                for($j=0;$j<count($irra);$j++) {
                    $hora_inicio = date('H:i:s', mktime($irra[$j], 0, 0));
                    $hora_fin = date('H:i:s', mktime($irra[$j]+1, 0, 0));
                    $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
                    $horas_efectuadas++;
                    $i++;
                }
            }
            $h++;
        }
        $server->Horas($horas_efectuadas, $ci);
    } else if($_POST['tipo'] == 'opc3') {
        if($horas_restantes > 0) {
            $dia = date('Y-m-d', mktime(0, 0, 0, $revers[1], $revers[0], $revers[2]));
            sort($irra, SORT_NATURAL);
            for($j=0;$j<count($irra);$j++) {
                $hora_inicio = date('H:i:s', mktime($irra[$j], 0, 0));
                $hora_fin = date('H:i:s', mktime($irra[$j]+1, 0, 0));
                $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
                $horas_efectuadas++;
            }
        }
        $server->Horas($horas_efectuadas, $ci);
    } else {
        echo 'MANCO 2';
    }
} else {
    echo "MANCOOOO";
}
?>
