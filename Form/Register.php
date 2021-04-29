<?php
include '../servidor.php';
$server= new servidor();
if(isset($_POST['ci'])){
    if(isset($_POST['Usename']) && isset($_POST['Password'])){
        $ci = $_POST['ci'];
        $user = $_POST["Usename"];
        $pwd = $_POST["Password"];
        if($server->crearUsuario($user, $pwd, $ci)){
            $respuesta = 3;
        }else{
            $respuesta = 4;
        }    
    }else{
        $ci = $_POST['ci'];
        if($server->ComprobarCI($ci)){
            $respuesta = 1;
        }else{
            $respuesta = 2;
        }
    }    
}else{
    $respuesta = 5;
}
echo $respuesta;
return $respuesta;
?>