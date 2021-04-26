<?php
include '../servidor.php';
$server= new servidor();
alert("holaaa");
if(isset($_POST['usuario'])){
    alert("holaaa");
    $user = $_POST["usuario"];
    $pwd = $_POST["passw"];

    if($server->login($user, $pwd)){
        $log = 1;
    }else{
        $log = 0;
    }    
}else{
    $log = 0;
}
return $log;

?>