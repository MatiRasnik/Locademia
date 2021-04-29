<?php

    date_default_timezone_set("America/Los_Angeles");
    $mes = isset($_POST['mes']) ? $_POST['mes']: date("n");
    $mesActual = date("m");
    $año = isset($_POST['año']) ? $_POST['año']: date("Y");
    $añoActual = date("Y");
    $dia = date("d");
    if($mes > 12){
    $mes = 1;
    $año++;
    }
    if($mes < 1){
    $mes = 12;
    $año--;
    }
    $diasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $año);
    $diaSemana=date("N",mktime(0,0,0,$mes,1,$año));
    $primerDia = $diaSemana - 1;
    $meses = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre");

    $calendario = "<div class='año'>";

    if($mes == $mesActual && $año == $añoActual){

    }else{
        $calendario .= "<button class='botonesCal' onclick='mesAnterior($mes, $año)'> < </button>";
    }    

    $calendario .= "    <h2>$año</h2>
                        <button class='botonesCal' onclick='mesSiguiente($mes, $año)'> > </button>
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
            if($i == $dia && $mes == $mesActual && $año == $añoActual){
                $calendario .= "<td><button class='dias diaActual' id='$i-$mes-$año' onclick='revisarHoras(this.id, $i, $mes, $año)'>" . $i . "</button></td>";
            }
            else{
                if($i > $dia || $mes > $mesActual || $año > $añoActual){
                    $calendario .= "<td><button class='dias' id='$i-$mes-$año' onclick='revisarHoras(this.id, $i, $mes, $año)'>" . $i . "</button></td>";
                } elseif($i < $dia && $mes <= $mesActual && $año <= $añoActual){
                    $calendario .= "<td><button class='dias' id='$i-$mes-$año' disabled>" . $i . "</button></td>";
                }
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
