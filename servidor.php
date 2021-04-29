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
        return false;
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
        return $respuesta;}

    function traicoCoches($tipo){
        $conn = $this->conectar();

        $sql = "CALL traicoCoches(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $tipo);
        $us="";
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result(/*arry coches*/);

        }}

    function horariosCoches($matricula){
        $conn = $this->conectar();

        $sql = "CALL horariosCoche(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $matricula);
        $us="";
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result(/*arry horarios*/);

        }}
}
?>
