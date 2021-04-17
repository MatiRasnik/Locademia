<?php
include 'conexion.php';
    if(isset($_POST['ci'])){
        $sql = "SELECT * FROM cliente WHERE CI = '" . $_POST['ci'] . "'";
        $result = $mysqli->query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (isset($ss['ci'])) {
            $asd = "1";
        } else {
        $asd = "2";
        }
    }else{
        if(isset($_POST['CI']) && isset($_POST['Usename']) && isset($_POST['Password'])){
            $sql = "SELECT * FROM usuario WHERE Username = '" . $_POST['Usename'] . "'";
            $result = $mysqli->query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (isset($ss['Usuario'])) {
                $asd ="4";
            } else {
                $usuario = '"' . $mysqli->real_escape_string($_POST['Usename']) . '"';
                $contra = '"' . $mysqli->real_escape_string($_POST['Password']) . '"';
                $CI = '"' . $mysqli->real_escape_string($_POST['CI']) . '"';
                $insert_row = $mysqli->query("INSERT INTO usuario  (Username, Pass, CI) VALUES($usuario, $contra, $CI)");
                $asd = "3";
            }
        }else{
            $asd = "4";
        }
    }
    echo $asd;
    return $asd;
?>