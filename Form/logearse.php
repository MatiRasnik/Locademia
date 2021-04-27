<?php
include '../servidor.php';
$server= new servidor();

if(isset($_POST['usuario'])){
    $user = $_POST["usuario"];
    $pwd = $_POST["passw"];

    if($server->login($user, $pwd)){
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