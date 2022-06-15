<?php
    if(isset($_SESSION['success'])){
        echo "<div class='alert alert-success'>".$_SESSION['succes']."</div>";
    }


    class Goles {

        public function obtener_goles($NOMBRE) {
            $db = new Connection();
            $query = "SELECT NOMBRE, EQUIPO FROM INFORMACION WHERE NOMBRE = $NOMBRE";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while ($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'NOMBRE' => $row['EQUIPO'],
                        'NOMBRE' => $row['EQUIPO'],
                    ];
                }//end while
            }//end if
            return $datos;
        }//end obtener

    }//end class 