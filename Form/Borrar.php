<?php
include '../servidor.php';
$server= new servidor();

if(isset($_POST['dia'])){
    $dia = $_POST["dia"];
    $hora_inicio = $_POST["horai"];
    $hora_fin = $_POST["horaf"];
    $ci = $_POST["ci"];
    $respuesta = $server->Borrar($dia, $hora_inicio, $hora_fin, $ci);
    if($respuesta != "1"){
        if($respuesta != "2"){
            $respuesta = "0";
        }   
    }
}else{
    $respuesta = "0";
}
echo $respuesta;
return $respuesta;
?>