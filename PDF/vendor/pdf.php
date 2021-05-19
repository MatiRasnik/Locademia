<?php
session_start();
require_once('autoload.php');

$css = file_get_contents('../../css/styles.css');

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L'
]);

$ci = $_SESSION['ci'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$telefono = $_SESSION['telefono'];
$mail = $_SESSION['mail'];
$direccion = $_SESSION['direccion'];
$horas_efectuadas = $_SESSION['horas_efectuadas'];
$horas_reservadas = $_SESSION['horas_reservadas'];
$matricula = $_SESSION['matricula'];
$nombre_C = $_SESSION['nombre_C'];
$tipo = $_SESSION['tipo'];
$horas_restantes = $_SESSION['horas_restantes'];



$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml("  <div class='pdf'>
                        <div class='logo'>
                            <img class='logo-img' width='400' src='../../img/LogoV1.1 - Transparente (Negro).png'>
                        </div>
                        <p>Este PDF muestra la información de tu contrato, incluyendo todas las horas reservadas, el chofer y el tipo de auto.</p>
                        <div class='Informacion-pdf'>
                            <hr>
                            <columns column-count='2'>
                            
                            <p><i class='fas fa-address-card'></i><b>Documento:</b> $ci</p>
                            <p><b>Nombre:</b> $nombre</p>
                            <p><b>Apellido:</b> $apellido</p>
                            <p><b>Teléfono:</b> $telefono</p>
                            <p><b>Email:</b> $mail</p>
                            <p><b>Direccion:</b> $direccion</p>

                            <columnbreak />

                            <p><b>Horas Contratadas:</b> $horas_reservadas</p>
                            <p><b>Horas Agendadas:</b> $horas_efectuadas</p>
                            <p><b>Horas Restantes:</b> $horas_restantes</p>
                            <p><b>Tipo de Auto:</b> $tipo</p>
                            <p><b>Nombre del Chofer:</b> $nombre_C</p>
                            <p><b>Matricula:</b> $matricula</p>

                            <columns column-count='0'>
                        </div>        
                        <hr>                                     
                    </div>",
                     \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();
session_unset();
?>