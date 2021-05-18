<?php
include '../servidor.php';
$server= new servidor();
session_start();
$ci = $_SESSION['ci'];
$matricula = $_SESSION['matricula'];
list($horas_efectuadas, $horas_contratadas) = $server->Contrato($ci);
$horas_restantes = $horas_contratadas - $horas_efectuadas;
if(isset($_POST['arri']) && isset($_POST['diaG']) && isset($_POST['tipo'])) {
    $irra = $_POST['arri'];
    $revers = explode('-', $_POST['diaG']);
    if($_POST['tipo'] == 'opc1') {
        for($i=0;$i<$horas_restantes;$i++) {
            $dia = date('Y-m-d', mktime(0, 0, 0, $revers[1], $revers[0]+$i, $revers[2]));
            sort($irra, SORT_NATURAL);
            for($j=0;$j<count($irra);$j++) {
                $hora_inicio = $irra[$j];
                $hora_fin =$hora_inicio + 1;
                $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
            }
        }
    } else if($_POST['tipo'] == 'opc2') {
        for($i=0;$i<$horas_restantes;$i++) {
            $dia = date('Y-m-d', mktime(0, 0, 0, $revers[1], $revers[0]+$i*7, $revers[2]));
            sort($irra, SORT_NATURAL);
            for($j=0;$j<count($irra);$j++) {
                $hora_inicio = $irra[$j];
                $hora_fin =$hora_inicio + 1;
                $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
            }
        }
    } else if($_POST['tipo'] == 'opc3') {
        $dia = date('Y-m-d', mktime(0, 0, 0, $revers[1], $revers[0], $revers[2]));
        sort($irra, SORT_NATURAL);
        for($j=0;$j<count($irra);$j++) {
            $hora_inicio = $irra[$j];
            $hora_fin =$hora_inicio + 1;
            $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
        }
    } else {
        echo 'MANCO 2';
    }
} else {
    echo "MANCOOOO";
}
?>
