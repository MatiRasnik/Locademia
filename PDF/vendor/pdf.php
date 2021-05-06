<?php

require_once('autoload.php');

$css = file_get_contents('../../css/styles.css');

$mpdf = new \Mpdf\Mpdf([

]);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml("  <div class='logo'>
                        <img src=''>
                    </div><h1 class='pruebacss'>Prueba</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sunt.</p>",
                     \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();

?>