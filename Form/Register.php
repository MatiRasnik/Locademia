<?php
    if(isset($_POST['ci'])){
        $CI = $_POST['ci'];
        //if($CI == cedula bd){
            correcto();
        //}else{
            incorrecto();
        //}
    }else{
        if(!ctype_alnum($_POST['Nombre'],$_POST['Apellido'],$_POST['Telefono'],$_POST['Direccion'],)){
            //lo guardamos
            correcto2();
        }else{
            incorrecto2();
        }
    }
?>