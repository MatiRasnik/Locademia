<?php
class servidor{

    function conectar(){

        if(!$conexion = mysqli_connect('localhost','root','root','locademia')){
            echo "No se pudo conectar a la base de datos";
            exit;
        }else{
            $sql = "set names 'utf8'";
            mysqli_query($conexion, $sql);
            return $conexion;
        }
    }

    function crearUsuario($usuario, $pass, $ci){
        $conn = $this->conectar();

        $sql = "CALL crearUsuario(?,?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("ssi",$usuario, $pass, $ci)
        }
    }

    function login(){

    }




}
?>