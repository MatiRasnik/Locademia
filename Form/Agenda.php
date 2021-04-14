<?php

    date_default_timezone_set("America/Los_Angeles");
    $mes = isset($_POST['mes']) ? $_POST['mes']: date("n");
    $mesActual = date("m");
    $aÃ±o = isset($_POST['aÃ±o']) ? $_POST['aÃ±o']: date("Y");
    $aÃ±oActual = date("Y");
    $dia = date("d");
    if($mes > 12){
    $mes = 1;
    $aÃ±o++;
    }
    if($mes < 1){
    $mes = 12;
    $aÃ±o--;
    }
    $diasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $aÃ±o);
    $diaSemana=date("N",mktime(0,0,0,$mes,1,$aÃ±o));
    $primerDia = $diaSemana - 1;
    $meses = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre");

    $calendario = "<div class='año'>
                        <button class='botonesCal' onclick='mesAnterior($mes, $aÃ±o)'> < </button>
                        <h2>$aÃ±o</h2>
                        <button class='botonesCal' onclick='mesSiguiente($mes, $aÃ±o)'> > </button>
                    </div>
                    <div class='mes'><h3>$meses[$mes]</h3></div><hr>";
    $calendario .= "<table id='calendar'>
                        <tr>
                            <th>Lun</th>
                            <th>Mar</th>
                            <th>Mie</th>
                            <th>Jue</th>
                            <th>Vie</th>
                            <th>Sab</th>
                            <th>Dom</th>
                        </tr>";
        $calendario .= "<tr>";

        
        $semana = 0;


        if($primerDia > 1){
            for($i = 0; $i < $primerDia; $i++){
                $calendario .= "<td></td>";
            }
            $semana += $primerDia;
        }
        for($i = 1; $i <= $diasMes; $i++){
            if($i == $dia && $mes == $mesActual && $aÃ±o == $aÃ±oActual){
                $calendario .= "<td><button class='dias diaActual' id='$i$mes$aÃ±o' >" . $i . "</button></td>";
            }
            else{
                $calendario .= "<td><button class='dias' id='$i$mes$aÃ±o' >" . $i . "</button></td>";
            }
            $semana++;
            if($semana % 7 == 0){
                $calendario .= "</tr><tr>";
            }
        }
        $calendario .= "</tr>
            </table>";

        echo $calendario;

        return $calendario;
?>