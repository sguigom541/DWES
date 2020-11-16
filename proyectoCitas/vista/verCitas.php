<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>

<body>

    <?php
    require_once '../vista/cabeceraCerrarSesion.php';
    require_once('../control/gbd.inc.php');
    session_start();
    $usuario=$_SESSION['usuario'];
        $citasUsuario=listaCitaBD($usuario);
    ?>

    <nav>
        <ul id="button">
            <li><a href="verCitas.php">Ver Citas</a></li>
            <li><a href="solicitarCita.php">Pedir Citas</a></li>
            <li><a href="actualizarDatosUsuario.php">Actualizar Datos</a></li>
        </ul>
    </nav>
    <div id="tabla">
        <h4>Citas</h4>
        <table>
            <thead>
                <th>Fecha y Hora</th>
                <th>Tipo Servicio</th>
                <th>Descripción servicio</th>
            </thead>
            <tbody>
                <?php
                    foreach($citasUsuario as $clave => $valor)
                    {
                        echo '<tr>';
                        echo '<td>'.$valor->fechaHora.'</td>';
                        echo '<td>'.$valor->nombre.'</td>';
                        echo '<td>'.$valor->descripcion.'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>



    <?php
    require_once('pie.php');
    ?>
</body>

</html>