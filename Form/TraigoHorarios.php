<?php
include '../servidor.php';
$server= new servidor();
$horas = array();
if(isset($_POST['matricula'])){
    $matricula = $_POST["matricula"];
    echo json_encode($server->horariosCoches($matricula));
}else{
    $horas[0] = "1";
    echo json_encode($horas);
}

?>