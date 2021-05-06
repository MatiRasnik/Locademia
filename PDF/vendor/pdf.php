<?php

require_once('autoload.php');

$css = file_get_contents('../../css/styles.css');

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L'
]);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml("  <div class='pdf'>
                        <div class='logo'>
                            <img class='logo-img' width='400' src='../../img/LogoV1.1 - Transparente (Negro).png'>
                        </div>
                        <p>Este PDF muestra la información de tu contrato, incluyendo todas las horas reservadas, el chofer y el tipo de auto.</p>
                        <div class='Informacion-pdf'>
                            <hr>
                            <columns column-count='2'>
                            
                            <p><i class='fas fa-address-card'></i><b>Documento:</b> Undefined</p>
                            <p><b>Nombre:</b> Undefined</p>
                            <p><b>Apellido:</b> Undefined</p>
                            <p><b>Teléfono:</b> Undefined</p>
                            <p><b>Email:</b> Undefined</p>
                            <p><b>Direccion:</b> Undefined</p>

                            <columnbreak />

                            <p><b>Horas Reservadas:</b> Undefined</p>
                            <p><b>Horas Efectuadas:</b> Undefined</p>
                            <p><b>Horas Restantes:</b> Undefined</p>
                            <p><b>Tipo de Auto:</b> Undefined</p>
                            <p><b>Nombre del Chofer:</b> Undefined</p>
                            <p><b>Matricula:</b> Undefined</p>

                            <columns column-count='0'>
                        </div>        
                        <hr>                                     
                    </div>",
                     \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();

?>