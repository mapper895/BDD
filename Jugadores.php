<?php
    require_once "models/Jugador.php";
    $tabla_jugador = new Jugador();
    $estados = $tabla_jugador->obtener_Jugador();