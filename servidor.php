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

    function login(){

    }
/*
    switch($_POST['Funcion']){
        case "1":
            $fun = $this->crearUsuario($_POST['usuario'],$_POST['pass'],$_POST['ci']);
            break;
        case "2":
            $fun = $this->login($_POST['usuario'],$_POST['pass']);
            break;
        case "3":
            break;
    }
    function crearUsuario($usuario, $pass, $ci){
        $respuesta;
        $conn = $this->conectar();
        if(isset($_POST['ci'])){
            if(isset($_POST['usuario']) && isset($_POST['pass'])){
                else{
                    $sql = "CALL crearUsuario(?,?,?)";
                    $stmts = $conn->prepare($sql);
                    $stmts->bind_param("ssi",$usuario, $pass, $ci);
                    if($stmts->execute()){
                        $stmts->store_result()
                        $stmts->bind_result($result)
                        if($result = 1){
                            $respuesta = "3";
                        }else{
                            $respuesta = "4";
                        }
                    }else{
                        $respuesta = "5";
                    }
                }
            }else{
                $sql = "CALL ComprobarCI(?)";
                $stmts = $conn->prepare($sql);
                $stmts->bind_param("i",$ci);
                if($stmts->execute()){
                    $stmts->store_result()
                        $stmts->bind_result($result)
                        if($result = 1){
                            $respuesta = "1";
                        }else{
                            $respuesta = "2";
                        }
                }else{
                    $respuesta = "5";
                }
            }
        }else{
            $respuesta = "2";
        }
        $conn = $this->close();
        return $respuesta;
    }


*/
}
?>