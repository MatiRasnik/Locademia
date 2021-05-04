<?php
include '../servidor.php';
$server= new servidor();

if(isset($_POST['cedula'])){
    $ci = $_POST["cedula"];
    $coches = $server->traigoCoches($ci);
    if($coches !== null){
        $autos = json_encode($coches);
    }else{
        $autos = "0";
    }    
}else{
    $autos = "0";
}
return $autos;
?>