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
?>
