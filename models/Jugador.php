<?php
    require_once "connection/Connection.php";

    class Jugador {

        public function obtener_Jugador() {
            $db = new Connection();
            $query = "SELECT NOMBRE, EQUIPO FROM INFORMACION";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while ($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'NOMBRE' => $row['NOMBRE'],
                        'EQUIPO' => $row['EQUIPO'],
                    ];
                }//end while
            }//end if
            return $datos;
        }//end obtener

    }//end class 