<?php
session_start();
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
                    $_SESSION['ci']=$ci;
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
        $sql = "CALL crearUsuario(?,?,?,@x)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("ssi",$user, $pwd, $ci);
        if($stmts->execute()){
            //$stmts->store_result();
            //$stmts->bind_result($x);
            $resultado = $conn->query('SELECT @x as p_out');
            $x = $resultado->fetch_assoc();
            if($x['p_out'] == "1"){
                $stmts->close();
                $valor = 1;
            }else{
                $stmts->close();
                $valor = 2;
            }
        }else{
            $valor = 2;
        }
        return $valor;
        }
    
    function ComprobarCI($ci){
        $conn = $this->conectar();
        $sql = "CALL ComprobarCI(?)";
        $stmts = $conn->prepare($sql);
        $stmts->bind_param("i",$ci);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($ci);
            if($stmts->fetch()){
                if($ci == null){
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
        $conn = $this->close();
        return false;}

    function traigoCoches($ci){
        $coches = array();
        $conn = $this->conectar();

        $sql = "CALL traigoCoches(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $ci);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($x);

            while($stmts->fetch()){
                $car = array('c'=> $x);
                $coches[] = $car;
            }
                $stmts->close();
                return $coches;
        }else{
            $stmts->close();
            return $stmts->error;
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

        function infoCliente($ci){
            $conn = $this->conectar();
    
            $sql = "CALL infoCliente(?)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("i", $ci);
            $us="";
            if($stmts->execute()){
                $stmts->store_result();
                $stmts->bind_result(/*arry horarios*/);
    
            }}
}
?>
