<?php
if(isset($_POST['Horas2'])) {
    $log2 = $_POST['Horas2'];// yy-mm-dd
}
if(isset($_POST['dia'])) {
    $arr = explode('-',$_POST['dia']);
}

$horas = [];
if(isset($log2)) {
    for($h=0;$h<count($log2);$h++) {//cont log2 = 1
        $diaRes = explode('-', $log2[$h]["dia"]);//yy
        if($diaRes[2] == $arr[0] && $diaRes[1] == $arr[1] && $diaRes[0] == $arr[2]) {
            array_push($horas, substr($log2[$h]["horaComienzo"], 0, 2));
            array_push($horas, substr($log2[$h]["horaFin"], 0, 2));
        }
    }
    echo json_encode($horas);
    //echo json_encode($horas);
}

?>
