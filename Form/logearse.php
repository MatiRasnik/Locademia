<?php
include '../servidor.php';
$server= new servidor();

if(isset($_POST['usuario'])){
    $user = $_POST["usuario"];
    $pwd = $_POST["passw"];
    $log = $server->login($user, $pwd);
    if($log !== null){
        return $log;
    }else{
        $log = "0";
    }    
}else{
    $log = "0";
}
echo $log;
return $log;

?>