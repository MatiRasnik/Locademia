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

    function close(){
        $conexion->close();
    }

    function crearUsuario($user, $pwd, $ci){
        $conn = $this->conectar();
        $sql = "CALL crearUsuario(?,?,?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("ssi",$user, $pwd, $ci);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($usuario,$pass);
            if($stmts->fetch()){
                if($usuario == null){
                    $stmts->close();
                    $register = 4;
                }else{
                    $stmts->close();
                    $register = 3;
                }
            }else{
                $register = 4;
            }
        
        }else{
            $register = 5;
        }
        return $register;
        }
    }

    function ComprobarCI($ci){
        $conn = $this->conectar();
        $sql = "CALL ComprobarCI(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i",$ci);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($usuario,$pass);
            if($stmts->fetch()){
                if($comprobacion == null){
                    $stmts->close();
                    $register = 2;
                }else{
                    $stmts->close();
                    $register = 1;
                }
            }else{
                $register = 2;
            }    
        }else{
            $respuesta = 5;
        }
        $conn = $this->close();
        return $respuesta;
    }
    
    function login($usuario, $pass){
        $conn = $this->conectar();

        $sql = "CALL login(?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("ss",$usuario, $pass);

        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($us,$pas);
            if($stmts->fetch()){
                if($us== null){
                    $stmts->close();
                    $log = 0;
                }else{
                    $stmts->close();
                    $log = 1;
                }
            }else{
                $log = 0;
            }
        
        }else{
            $log = 0;
        }
        return $log;
        }
?>