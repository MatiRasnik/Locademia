<?php
include '../servidor.php';
$server= new servidor();
if(isset($_POST['arri']) && isset($_POST['diaG']) && isset($_POST['tipo'])) {
    $pasaBD = [][];


    $server->agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin);
} else {
    echo "MANCOOOO";
}

?>
