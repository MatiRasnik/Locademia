<?php
if(isset($_POST['ci'])){
    if(isset($_POST['Usename']) && isset($_POST['Password'])){
        include '../servidor.php';
        $server = new servidor();
        $ci = $_POST['ci'];
        $user = $_POST["Usename"];
        $pwd = $_POST["Password"];
        if($server->crearUsuario($user, $pwd, $ci)){
            $respuesta = 3;
        }else{
            $respuesta = 4;
        }    
    }else{
        include '../servidor.php';
        $server = new servidor();
        $ci = $_POST['ci'];
        if($server->ComprobarCI($ci)){
            $respuesta = 1;
        }else{
            $respuesta = 2;
        }    
    }else{
        $respuesta = 5;
    }
}else{
    $respuesta = 5;
}
echo $respuesta;
return $respuesta;
?>