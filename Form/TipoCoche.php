<?php
    $tipo = $_POST['tipo'];
    $modelo = isset($_POST['modelo']) ? $_POST['modelo']: "up" ;
    $tipocoche = "  <div class='tipo-wrapper-grid'>
                        <div class='tipo-wrapper'>
                            <h2>Seleccionar Modelo del Vehiculo:</h2>
                            <p>$tipo</p>
                            <select name='autos' id='autos' onChange=tipoAuto('$tipo');>";
    
    switch($tipo){
        case "Sedan":
            $tipocoche .=  "<option value='volvo'>Volvo</option>
                            <option value='saab'>Saab</option>
                            <option value='opel'>Opel</option>
                            <option value='audi'>Audi</option>";
            break;
        
        case "Hatchback":
            $tipocoche .=  "<option value='up'>Volkswagen Up!</option>
                            <option value='golf'>Volkswagen Golf</option>
                            <option value='208'>Peugeot 208</option>
                            <option value='audi'>Ford Focus</option>";
            break;
        
        case "Mini":
            $tipocoche .=  "<option value='volvo'>Volvo</option>
                            <option value='saab'>Saab</option>
                            <option value='opel'>Opel</option>
                            <option value='audi'>Audi</option>";
            break;
                        
    }

    $tipocoche .= "         </select>
                            <button>Seleccionar</button>
                        </div>
                        <div class='foto-vehiculo'>";

    switch($modelo){
        case "up":
            $tipocoche .=  "<img src='../img/Up.png' alt='' />";
            break;
        
        case "golf":
            $tipocoche .=  "<img src='../img/Golf.png' alt='' />";
            break;
        
        case "208":
            $tipocoche .=  "<img src='../img/208.png' alt='' />";
            break;

        case "Fiesta":
            $tipocoche .=  "<img src='../img/Focus.png' alt='' />";
            break; 
    }

    $tipocoche .= "</div>
            </div>";

    echo $tipocoche;
    return $tipocoche;

?>