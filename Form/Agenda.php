<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set("America/Montevideo");
    $mes = isset($_POST['mes']) ? $_POST['mes']: date("n");
    $mesActual = date("m");
    $año = isset($_POST['año']) ? $_POST['año']: date("Y");
    $añoActual = date("Y");
    $dia = date("d");
    if(isset($_POST['info'])){
        $info = $_POST['info'];
        $diasInfo = $_POST['diasinfo'];
        $agendadias = json_encode($diasInfo);
        if($info == 1){
            $infodias = array();
            for($e = 0;$e < count($diasInfo);$e++){
                $infodias = explode('-', $diasInfo[$e]);
            }
        }
    }
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
    $hora = date("H", mktime(date("H")+2));
    $calendario = "<div class='año'>";

    if($mes == $mesActual && $año == $añoActual){

    }else{
        $calendario .= "<button class='botonesCal' onclick='mesAnterior($mes, $año , $agendadias)'> < </button>";
    }    

    $calendario .= "    <h2>$año</h2>
                        <button class='botonesCal' onclick='mesSiguiente($mes, $año , $agendadias)'> > </button>
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


        if($primerDia >= 1){
            for($i = 0; $i < $primerDia; $i++){
                $calendario .= "<td></td>";
            }
            $semana += $primerDia;
        }
        for($i = 1; $i <= $diasMes; $i++){
            if($i == $dia && $mes == $mesActual && $año == $añoActual && date('N', mktime(0, 0, 0, $mesActual, $dia, $añoActual)) != 7){
                if(isset($info)){
                    $calendario .= "<td><a class='dias diaActual' id='$i-$mes-$año'>" . $i . "</a></td>";
                }else{
                    $calendario .= "<td><button class='dias diaActual' id='$i-$mes-$año' onclick='revisarHoras(this.id, $hora)'>" . $i . "</button></td>";
                }
            }else{
                if($i > $dia || $mes > $mesActual || $año > $añoActual && date('N', mktime(0, 0, 0, $mesActual, $dia, $añoActual)) != 7){
                    if(isset($info)){
                        $c = 0;
                        $a = 1;
                        $b = 2;
                        for($d = 0;$d < count($diasInfo);$d++){
                            
                            if($infodias[$b] == $i && $mes == $infodias[$a] && $año == $infodias[$c]){
                                $z = 1;
                                $d=count($diasInfo)+1;
                            }else{
                                $z = 0;
                            }
                            $c =+ 3;
                            $a =+ 3;
                            $b =+ 3;
                        }
                        if($z == 1){
                            $calendario .= "<td><a class='diasAgendado' id='$i-$mes-$año'>" . $i . "</a></td>";
                        }else{
                            $calendario .= "<td><a class='dias' id='$i-$mes-$año'>" . $i . "</a></td>";
                        }
                    }else if(date('N', mktime(0, 0, 0, $mes, $i, $año)) != 6 && date('N', mktime(0, 0, 0, $mes, $i, $año)) != 7 ) {
                        $calendario .="<td><button class='dias' id='$i-$mes-$año' onclick='revisarHoras(this.id, 03)'>" . $i . "</button></td>";
                    } else if(date('N', mktime(0, 0, 0, $mes, $i, $año)) == 6){
                        $calendario .= "<td><button class='dias' id='$i-$mes-$año' onclick='revisarSabado(this.id, 03)'>" . $i . "</button></td>";
                    }else if(date('N', mktime(0, 0, 0, $mes, $i, $año)) == 7){
                        $calendario .= "<td><button class='dias' style='background-color: #db5e5e;' id='$i-$mes-$año' disabled>" . $i . "</button></td>";
                    }
                } else if($i < $dia && $mes <= $mesActual && $año <= $añoActual && date('N', mktime(0, 0, 0, $mes, $i, $año)) != 7){
                    $calendario .= "<td><button class='dias' style='background-color: #666666;' id='$i-$mes-$año' disabled>" . $i . "</button></td>";
                } else if(date('N', mktime(0, 0, 0, $mes, $i, $año)) == 7) {
                    $calendario .= "<td><button class='dias' style='background-color: #db5e5e;' id='$i-$mes-$año' disabled>" . $i . "</button></td>";
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
