<?php
$gbd = new GBD("localhost", "sggveterinaria", "root", "");


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Estas son las mascotas disponibles</h1>
    <form action="" method="post">
    <select name="mascotas" id="mascotas">
        <?php
                $usuario = sesion::leer("usuario");
                $mascotas = $gbd->getMascotasUsuario($usuario);
                foreach ($mascotas as $clave) {
                echo '<option  value="'.$clave["codMascota"].'">'.$clave["nombreMascota"].'</option>';
            }
            ?>
    </select>
    <input type="submit" value="seleccionar">
    </form>
    
    
</body>

</html>