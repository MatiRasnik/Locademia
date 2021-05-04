<?php
include '../servidor.php';
$server= new servidor();
$autos = array();
if(isset($_POST['cedula'])){
    $ci = $_POST["cedula"];
    $coches = $server->traigoCoches($ci);
    if($coches !== null){
        $autos = $coches;
    }else{
        $autos = "1";
    }    
}else{
    $autos = "1";
}
return json_encode($autos);
?>