<?php
    /*if(isset($_POST['ci'])){
        $sql = "SELECT * FROM cliente WHERE CI = '" . $_POST['ci'] . "'";
        $result = $mysqli->query($sql);
        $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (isset($ss['ci'])) {
            echo "<script>correcto($_POST['ci']);</script>";
        } else {*/
           $asd=   " Su cedula es invalidada";
        /*}
    }else{*/
        if(isset($_POST['CI']) && isset($_POST['Usename']) && isset($_POST['Password'])){
            $sql = "SELECT * FROM usuario WHERE Username = '" . $_POST['Usename'] . "'";
            $result = $mysqli->query($sql);
            $ss = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (isset($ss['Usuario'])) {
                $asd= "ya se a registrado este usuario";
            } else {
                $usuario = '"' . $mysqli->real_escape_string($_POST['Usename']) . '"';
                $contra = '"' . $mysqli->real_escape_string($_POST['Password']) . '"';
                $CI = '"' . $mysqli->real_escape_string($_POST['CI']) . '"';
                $insert_row = $mysqli->query("INSERT INTO usuario  (Username, Pass, CI) VALUES($usuario, $contra, $CI)");
                echo "<script>correcto2();</script>";
            }
        }else{
            $asd= "ya se a registrado este usuario";
        }
    //}
    echo $asd;
    return $asd;
?>