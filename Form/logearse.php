<?php
include 'conexion.php';
echo 'hola';
if(isset($_POST['usuario']) && $_POST['constraseña']){
        $sql = "CALL login( ".$_POST['usuario'].",". $_POST['constraseña']." );";
        $result = $mysqli -> query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($result) {
                if (isset($ss['pass'])){
                        if($ss['pass']==$_POST['constraseña']){
                        session_start();
                        $_SESSION['Usuario']=$_POST['Username'];
                        header('Location: ../Agendar.html');
                        }else{ 
                                header('Location: ../Form/login.html');
                }
                         }else{ 
                                header('Location: ../Form/login.html');
                }
                }
}


?>