<?php
    include '../servidor.php';
    session_start();
    $ci = $_SESSION['ci'];
    $matricula = $_SESSION['matricula'];
    $server= new servidor();
    list($estado,$nombre,$apellido,$telefono,$mail,$direccion) = $server->Cliente($ci);
    list($horas_efectuadas,$horas_reservadas) = $server->Contrato($ci);
    list($tipo,$nombre_C) = $server->CocheChofer($matricula);
    $Info = array();
    $dias = array();
    $contador = 0;
    $i = 0;
    $Info = $server->InfoAgenda($ci);
    $horas_restantes=$horas_reservadas-$horas_efectuadas;
    $return =
    "<div class='info-conductor'>
        <div class='conductor-grid'>
            <div class='conductor'>
                <h1>Información Personal</h1>
                <hr>
                <p><b>Documento: </b>$estado</p>
                <p><b>Nombre: </b>$nombre</p>
                <p><b>Apellido: </b>$apellido</p>
                <p><b>Teléfono: </b>$telefono</p>
                <p><b>Email: </b>$mail</p>
                <p><b>Dirección: </b>$direccion</p>
            </div>
            <div class='conductor-logo'>
                <i class='fas fa-user'></i>
            </div>
            <div class='conductor'>
                <h1>Información Contrato</h1>
                <hr>
                <p><b>Horas Contratadas: </b>$horas_reservadas</p>
                <p><b>Horas Agendadas: </b>$horas_efectuadas</p>
                <p><b>Horas Restantes: </b>$horas_restantes</p>
                <p><b>Matricula: </b>$matricula</p>
                <p><b>Nombre de chofer: </b>$nombre_C</p>
                <p><b>Tipo de auto: </b>$tipo</p>
                
            </div>
        </div>";
        if(0 != count($Info)){
        $return .= "<table id='info-usuario'>
            <tr>
                <th>Dia</th>
                <th>Hora Inicio</th>
                <th>Hora fin</th>
            </tr>";
            foreach ( $Info as $r ) {
                $return .= '<tr>';
                foreach ( $r as $v ) {
                    $return .= '<td>'.$v.'</td>';
                    if($contador == "0"){
                        $dia = $v;
                        $dias[$i] = $v;
                        $i++;
                        $contador++;
                    }else{
                        if($contador == "1"){
                            $horai = $v;
                            $contador++;
                        }else{
                            $horaf = $v;
                            $contador = 0;
                        }
                    }
                }
                $Data = '"'.$dia.'","'.$horai.'","'.$horaf.'","'.$ci.'"';
                $return .="
                    <td>
                        <button onclick='borrar($Data)'>Cancelar</button>
                    </td>
                </tr>";
            }
            $agendadias = json_encode($dias);
            $pdf = '"'.$estado.'","'.$nombre.'","'.$apellido.'","'.$telefono.'","'.$mail.'","'.$direccion.'","'.$horas_efectuadas.'","'.$horas_reservadas.'","'.$tipo.'","'.$nombre_C.'","'.$horas_restantes.'"';
            $return .="</table>
            <script>CargarCalendario($agendadias)</script>
            <div id='calendario'></div>
    </div>
    <button onclick='PDF($pdf)'>Obtener PDF</button>";
    }else{
        $return .="<div class='conductor'> <h1>No tiene ninguna reserva</h1></div>";
    }
    echo $return;
    return $return;
?>