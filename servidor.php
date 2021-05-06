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
                    $_SESSION['ci'] = $ci;
                    echo $ci;
                    return $ci;
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
        $conn->close();
        return false;}

        
    function traigoCoches($ci){
        $coches = array();
        $conn = $this->conectar();

        $sql = "CALL traigoCoches(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $ci);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($ci, $matricula, $tipo, $descripcion, $url);

            while($stmts->fetch()){
                $car = array('ci'=> $ci, 'matricula' => $matricula, 'tipo' => $tipo, 'desc' => $descripcion, 'usr' =>$url);
                array_push($coches, $car);
            }
                $stmts->close();
                return $coches;
        }else{
            $stmts->close();
            array_push($coches, "error");
            return $coches;
        }
    }

    /*function horariosCoches($matricula){
        $conn = $this->conectar();

        $sql = "CALL horariosCoche(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $matricula);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result(arry horarios);

        }}*/
        function Cliente($ci){
            echo "<script> console.log(".$ci.")</script>";
            $conn = $this->conectar();
    
            $sql = "CALL cliente(?)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("i", $ci);
            if($stmts->execute()){
                $stmts->store_result();
                $stmts->bind_result($nombre,$apellido,$telefono,$mail,$direccion,$estado);
                if($stmts->fetch()){
                    if($nombre == null){
                        $stmts->close();
                        return false;
                    }else{
                        $stmts->close();
                        return array($estado,$nombre,$apellido,$telefono,$mail,$direccion);
                    }
                }else{
                    return false;
                }
            }
        }
        function Contrato($ci){
            $conn = $this->conectar();
    
            $sql = "CALL contrato(?)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("i", $ci);
            if($stmts->execute()){
                $stmts->store_result();
                $stmts->bind_result($horas_efectuadas,$horas_reservadas);
                if($stmts->fetch()){
                    if($horas_reservadas == null){
                        $stmts->close();
                        return false;
                    }else{
                        $stmts->close();
                        return array($horas_efectuadas,$horas_reservadas);
                    }
                }else{
                    return false;
                }
            }
        }
        function Automovil($ci){
            $conn = $this->conectar();
    
            $sql = "CALL Automovil(?)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("i", $ci);
            if($stmts->execute()){
                $stmts->store_result();
                $stmts->bind_result($matricula,$tipo);
                if($stmts->fetch()){
                    if($tipo == null){
                        $stmts->close();
                        return false;
                    }else{
                        $stmts->close();
                        return array($tipo,$matricula);
                    }
                }else{
                    return false;
                }
            }
        } 
        function InfoAgenda($ci){
            $Info = array();
            $conn = $this->conectar();
    
            $sql = "CALL InfoAgenda(?)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("i", $ci);
            if($stmts->execute()){
                $stmts->store_result();
                $stmts->bind_result($Dia,$Hora_Inicio,$Hora_fin);
                while($stmts->fetch()){
                    $data = array('dia' => $Dia, 'hora_i' => $Hora_Inicio, 'hora_f' =>$Hora_fin);
                    array_push($Info, $data);
                }
                    $stmts->close();
                    return $Info;
            }
        } 
        
}
?>
