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

    function VerificoSesion(){
        session_start();
        if(!isset($_SESSION["ci"])){
            return "1";
        }else{
            return "0";
        }
    }
    
    function login($usuario, $pass){
        $conn = $this->conectar();
        $info = array();
        $sql = "CALL login(?,?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("ss",$usuario, $pass);
        $us="";
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($ci,$us,$pas,$mat);
            if($stmts->fetch()){
                if($us == null){
                    $stmts->close();
                    return false;
                }else{
                    $stmts->close();
                    session_start();
                    $_SESSION['ci'] = $ci;
                    $_SESSION['matricula'] = $mat;
                    $info = array('ci'=> $ci, 'matricula' => $mat);
                    return $info;
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
                $car = array('ci'=> $ci, 'matricula' => $matricula, 'tipo' => $tipo, 'desc' => $descripcion, 'url' => $url);
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

    function horariosCoches($matricula){
        $horarios = array();
        $conn = $this->conectar();

        $sql = "CALL traigoHorarios(?)";
        $stmts = $conn->prepare($sql);

        $stmts->bind_param("s", $matricula);
        if($stmts->execute()){
            $stmts->store_result();
            $stmts->bind_result($id, $ci, $matricula, $dia, $horaComienzo, $horaFin);

            while($stmts->fetch()){
                $h = array('id'=> $id ,'ci'=> $ci, 'dia' => $dia, 'horaComienzo' => $horaComienzo, 'horaFin' => $horaFin);
                array_push($horarios, $h);
            }   
                $stmts->close();
                return $horarios;
        }else{
            $stmts->close();
            array_push($horarios, "error");
            return $horarios;
        }}

        function Cliente($ci){
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
        function CocheChofer($matricula){
            $conn = $this->conectar();
    
            $sql = "CALL CocheChofer(?)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("s", $matricula);
            if($stmts->execute()){
                $stmts->store_result();
                $stmts->bind_result($Nombre_C,$tipo);
                if($stmts->fetch()){
                    if($Nombre_C == null){
                        $stmts->close();
                        return false;
                    }else{
                        $stmts->close();
                        return array($Nombre_C,$tipo);
                    }
                }else{
                    return false;
                }
            }
        }
        function InfoAgenda($ci){
            $Info = array();
            $conn = $this->conectar();
    
            $sql = "CALL InfoAgenda(?,@x)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("i", $ci);
            if($stmts->execute()){
                $resultado = $conn->query('SELECT @x as p_out');
                $x = $resultado->fetch_assoc();
                if($x['p_out'] == "1"){
                    $stmts->store_result();
                    $stmts->bind_result($Dia,$Hora_Inicio,$Hora_fin);
                    while($stmts->fetch()){
                        $data = array('dia' => $Dia, 'hora_i' => $Hora_Inicio, 'hora_f' =>$Hora_fin);
                        array_push($Info, $data);
                    }
                    $stmts->close();
                }else{
                    $stmts->close();
                    $Info[0] = 'error';
                }
            }else{
                $Info[0] = 'error';
            }
            return $Info;
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

        function guardoAuto($ci, $mat){
            $conn = $this->conectar();
    
            $sql = "CALL guardoAuto(?,?)";
            $stmts = $conn->prepare($sql);
    
            $stmts->bind_param("is", $ci, $mat);
            if($stmts->execute()){
                $stmts->close();
                return true;
            }else{
                return false;
            }
        } 
        function Borrar($dia, $hora_inicio, $hora_fin, $ci){
            $conn = $this->conectar();
            $sql = "CALL Borrar(?,?,?,?,@x)";
            $stmts = $conn->prepare($sql);
            $stmts->bind_param("sssi",$dia, $hora_inicio, $hora_fin, $ci);
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
        function agendar($ci, $matricula, $dia, $hora_inicio, $hora_fin){
            $conn = $this->conectar();
            $sql = "CALL agendar(?,?,?,?,?,@x)";
            $stmts = $conn->prepare($sql);
            $stmts->bind_param("issss",$ci,  $matricula, $dia, $hora_inicio, $hora_fin);
            if($stmts->execute()){
                $resultado = $conn->query('SELECT @x as p_out');
                $x = $resultado->fetch_assoc();
                if($x['p_out'] == "1"){
                    $stmts->close();
                    $resultado = 1;
                }else{
                    $stmts->close();
                    $resultado = 2;
                }
            }else{
                $resultado = 2;
            }
            return $resultado;
        }
}
?>
 

       