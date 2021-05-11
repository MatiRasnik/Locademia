<?php
if(isset($_POST['Horas2'])) {
    $log2 = $_POST['Horas2'];
}

$horas = [];
if(isset($log2)) {
    for($h=0;$h<count($log2);$h++) {
        $diaRes = explode('-', $log2[$h]["dia"]);
        if($diaRes[2] == $arr[0] && $diaRes[1] == $arr[1] && $diaRes[0] == $arr[2]) {
            array_push($horas, $h);
        }
    }
    echo json_encode($horas);
}

?>
