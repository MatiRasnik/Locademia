<?php
include '../servidor.php';
$server= new servidor();
if(isset($_POST['ci']) && isset($_POST['matricula'])){
    $ci = $_POST["ci"];
    $mat = $_POST["matricula"];
    if($server->guardoAuto($ci, $mat)){
        echo "1";
    }else{
        echo "0";
    }
}else{
    echo "0";
}

?>