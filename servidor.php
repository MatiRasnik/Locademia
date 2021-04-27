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
    
    function login($usuario, $pass){
        $conn = $this->conectar();

        $sql = "CALL login(?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("ss",$usuario, $pass);
        $us="";
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($ci,$us,$pas);
            if($stmts->fetch()){
                if($us == null){
                    $stmts->close();
                    return false;
                }else{
                    $stmts->close();
                    return true;
                }
            }else{
                return false;
            }
        
        }else{
            return false;
        }
        }
    /*
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
                            $respuesta = 3;
                        }else{
                            $respuesta = 4;
                        }
                    }
                }else{
                    $sql = "CALL ComprobarCI(?)";
                    $stmts = $conn->prepare($sql);
                    $stmts->bind_param("i",$ci);
                    if($stmts->execute()){
                        $respuesta = 1;
                    }else{
                        $respuesta = 2;
                    }
                }
            }else{
                $respuesta = 5;
            }
            $conn = $this->close();
            return $respuesta;
        }*/
    }
    ?>
  