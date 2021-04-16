<?php
    $tipo = $_POST['tipo'];
    if($_POST['tipo'] == "Sedán"){
        $modelo = isset($_POST['modelo']) ? $_POST['modelo']: "Versa" ;
    }else if($_POST['tipo'] == "Hatchback"){
        $modelo = isset($_POST['modelo']) ? $_POST['modelo']: "Up" ;
    }else if($_POST['tipo'] == "Mini"){
        $modelo = isset($_POST['modelo']) ? $_POST['modelo']: "Fiat" ;
    }
    $tipocoche = "  <div class='tipo-wrapper-grid'>
                        <div class='tipo-wrapper'>
                            <h2>Seleccione el Modelo del Vehiculo:</h2>
                            <p>$tipo</p>
                            <select name='autos' id='autos' onChange=tipoAuto('$tipo');>";
    
    switch($tipo){
        case "Sedán":
            $tipocoche .=  "<option value='Versa'>Nissan Versa 2018</option>
                            <option value='ModelS'>Tesla Model S</option>
                            <option value='Lancer'>Mitsubishi Lancer</option>
                            <option value='Civic'>Honda Civic</option>";
            break;
        
        case "Hatchback":
            $tipocoche .=  "<option value='Up'>Volkswagen Up!</option>
                            <option value='Golf'>Volkswagen Golf</option>
                            <option value='208'>Peugeot 208</option>
                            <option value='Focus'>Ford Focus</option>";
            break;
        
        case "Mini":
            $tipocoche .=  "<option value='Fiat'>Fiat 500</option>
                            <option value='Beetle'>Volkswagen Beetle</option>
                            <option value='ae86'>Toyota ae86</option>
                            <option value='Smart'>Smart ForTwo</option>";
            break;
                        
    }

    $tipocoche .= "         </select>
                            <button onclick='agenda()'>Seleccionar</button>
                        </div>
                        <div class='foto-vehiculo'>";

    switch($modelo){

        //SEDAN

        case "Versa":
            $tipocoche .=  "<img src='../img/Versa.png' alt='' />";
            break;
        
        case "ModelS":
            $tipocoche .=  "<img src='../img/ModelS.png' alt='' />";
            break;
        
        case "Lancer":
            $tipocoche .=  "<img src='../img/Lancer.png' alt='' />";
            break;

        case "Civic":
            $tipocoche .=  "<img src='../img/Civic.png' alt='' />";
            break; 

        //HATCHBACK

        case "Up":
            $tipocoche .=  "<img src='../img/Up.png' alt='' />";
            break;
        
        case "Golf":
            $tipocoche .=  "<img src='../img/Golf.png' alt='' />";
            break;
        
        case "208":
            $tipocoche .=  "<img src='../img/208.png' alt='' />";
            break;

        case "Focus":
            $tipocoche .=  "<img src='../img/Focus.png' alt='' />";
            break;

        //MINI

        case "Fiat":
            $tipocoche .=  "<img src='../img/Fiat500.png' alt='' />";
            break;
        
        case "Beetle":
            $tipocoche .=  "<img src='../img/Beetle.png' alt='' />";
            break;
        
        case "ae86":
            $tipocoche .=  "<img src='../img/ae86.png' alt='' />";
            break;

        case "Smart":
            $tipocoche .=  "<img src='../img/Smart.png' alt='' />";
            break;  
    }

    $tipocoche .= "</div>
            </div>";

    echo $tipocoche;
    return $tipocoche;

?>