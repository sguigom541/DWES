<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista Usuario</title>
    <link rel="stylesheet" href="../estilos/estilos.css">


</head>

<body>
    <?php
    require_once('cabeceraCerrarSesion.php');
    ?>
    <?php
        session_start();
    ?>
    
    <nav>
        <ul id="button">
            <li><a href="verCitas.php">Ver Citas</a></li>
            <li><a href="solicitarCita.php">Pedir Citas</a></li>
            <li><a href="actualizarDatosUsuario.php">Actualizar Datos</a></li>
        </ul>
    </nav>
    
        


    <?php
    require_once('pie.php');
    ?>
</body>

</html>