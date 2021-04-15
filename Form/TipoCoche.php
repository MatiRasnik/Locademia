<?php

    $tipo = $_POST['tipo'];
    $tipocoche = "  <div class='tipo-wrapper-grid'>
                        <div class='tipo-wrapper'>
                            <h2>Seleccionar Modelo del Vehiculo:</h2>
                            <p>$tipo</p>
                            <select name='autos' id='autos'>";
    
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
                            <option value='opel'>Opel</option>
                            <option value='audi'>Audi</option>";
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
                        <div class='foto-vehiculo'>
                            <img src='../img/Up.png' alt='' />
                        </div>
                    </div>";

    echo $tipocoche;
    return $tipocoche;

?>