<?php
include 'conexion.php';
if(isset($_POST['ci'])){
    $sql = "SELECT * FROM cliente WHERE CI = '" . $_POST['ci'] . "'";
    $result = $mysqli->query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (isset($ss['CI'])) {
        $respuesta = "1";
    } else {
    $respuesta = "2";
    }
}else{

if(isset($_POST['CI']) && isset($_POST['Usename']) && isset($_POST['Password'])){
    $sql = "SELECT * FROM cuenta WHERE username = '" . $_POST['Usename'] . "'";
    $result = $mysqli->query($sql);
    $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (isset($ss['Username'])) {
        $respuesta ="4";
    } else {
        $usuario = '"' . $mysqli->real_escape_string($_POST['Usename']) . '"';
        $contra = '"' . $mysqli->real_escape_string($_POST['Password']) . '"';
        $CI = '"' . $mysqli->real_escape_string($_POST['CI']) . '"';
        $insert_row = $mysqli->query("INSERT INTO usuario  (Username, Pass, CI) VALUES($usuario, $contra, $CI)");
        $respuesta = "3";
    }
}else{
    $respuesta = "4";
}
}
echo $respuesta;
return $respuesta;
?>