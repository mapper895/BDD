<?php
    require_once "models/Goles.php";
    $municipios = [];
    if(isset($_GET['NOMBRE'])) {
        $tabla_Goles = new Goles();
        $Goles = $tabla_Goles->obtener_goles($_GET['NOMBRE']);
    }//end if
    echo json_encode(['data' => $Goles]);