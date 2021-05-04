<?php
include '../servidor.php';
$server= new servidor();

if(isset($_POST['tipo'])){
    $tipo = $_POST["tipo"];

    if($server->traigoCoches($tipo)){
        $log = "1";
    }else{
        $log = "0";
    }    
}else{
    $log = "0";
}
echo $log;
return $log;
?>