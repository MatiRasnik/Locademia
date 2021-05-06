<?php
    session_start();
    $ci = $_SESSION["ci"];
    include '../servidor.php';
    $server= new servidor();
    list($estado,$nombre,$apellido,$telefono,$mail,$direccion) = $server->Cliente($ci);
    list($horas_efectuadas,$horas_reservadas) = $server->Contrato($ci);
    //list($tipo,$matricula) = $server->Automovil($ci);
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
                <p><b>Horas Reservadas: </b>$horas_reservadas</p>
                <p><b>Horas Efectuadas: </b>$horas_efectuadas</p>
                <p><b>Horas Restantes: </b>$horas_restantes</p>
                
            </div>
        </div>
        <table>
            <tr>
                <th>Dia</th>
                <th>Hora Inicio</th>
                <th>Hora fin</th>
            </tr>
            while($Info->fetch()){
                <tr>
                    <th>$Info</th>
                    <th>$Info</th>
                    <th>$Info</th>
                </tr>
            }    
        </table>
    </div>";
    echo $return;
    return $return;
?>