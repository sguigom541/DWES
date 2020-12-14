<?php
    $gbd=new GBD("localhost", "sggveterinaria", "root", "");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasar Visita</title>
</head>

<body>
    <div class="container_visita">
        <form action="" method="POST">
            <label for="usuario">Dueño</label>
            <input type="text" name="" id="">
            <label for="codMascota">Mascota</label>
            <input type="text" name="codMascota" id="">
            <label for="motivoVisita"> Motivo</label>
            <textarea name="motivoVisita" id="motivoVisita" cols="50" rows="10"></textarea>
            <label for="quiereVacuna">¿Quiere poner una vacuna?</label>
            <input type="checkbox" name="quiereVacuna" id="">
            <div class="vacuna">
                <label for="tipoVacuna">Tipo Vacuna</label>
                
                <select name="tipoVacuna" id="">
                <?php 
                    $arrayVacuna=$gbd->getAll("vacuna");
                    foreach ($arrayVacuna as $clave) {
                        echo '<option  value="'.$clave->getCodVacuna().'">'.$clave->getNombre().'</option>';
                    }
                ?>
                
                </select>
            </div>
            <label for="problemasDetectados">Problemas Detectados</label>
            <textarea name="problemasDetectados" id="problemasDetectados" cols="50" rows="10"></textarea>
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" cols="50" rows="10"></textarea>
            <input type="submit" value="Pasar Visita">
        </form>

    </div>
</body>

</html>