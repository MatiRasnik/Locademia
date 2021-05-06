<?php
include '../servidor.php';
$server= new servidor();
$autos = array();
if(isset($_POST['cedula'])){
    $ci = $_POST["cedula"];
    echo json_encode($server->traigoCoches($ci));
}else{
    $autos[0] = "1";
    echo json_encode($autos);
}

?>