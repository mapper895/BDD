<?php
    require "Jugadores.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultas dinámicas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>

    <?php
    if(isset($_SESSION['success'])){
        echo "<div class='alert alert-success'>".$_SESSION['succes']."</div>";
    }
?>
        <div class="container">
            <h1 class="text-center">Consultas dinámicas Proyecto</h1>
            <div class="row justify-content-md-center">
                <div class="form-group col-md-4">
                    <label for="">Jugador:</label>
                    <select id="id_estado" class="form-control">
                        <option value="">Seleccionar Jugador</option>
                        <?php
                            foreach ($estados as $estado) {
                                echo '<option value="'.$estado['NOMBRE'].'">'.$estado['NOMBRE'].'</option>';
                            }//end foreach
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Goles:</label>
                    <select id="goles" class="form-control">
                        <option value="">Seleccionar</option>
                    </select>
                </div>
            </div>
        </div>

        <script>
            document.querySelector('#nombre').addEventListener('change', event => {
                fetch('goles.php?id_estado='+event.target.value)
                .then(res => {
                    if(!res.ok) {
                        throw new Error('Hubo un error en la respuesta');
                    }//en if
                    return res.json();
                })
                .then(datos => {
                    let html = '<option value="">Seleccionar Goles</option>';
                    if(datos.data.length > 0) {
                        for (let i = 0; i < datos.data.length; i++) {
                            html += `<option value="${datos.data[i].id}">${datos.data[i].nombre}</option>`;
                        }//end for
                    }//end if
                    document.querySelector('#goles').innerHTML = html;
                })
                .catch(error => {
                    console.error('Ocurrió un error '+error);
                });
            });
        </script>

    </body>
</html>