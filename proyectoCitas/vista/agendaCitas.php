<?php
require_once "../control/gbd.inc.php";
session_start();
$usuario = $_SESSION['usuario'];
$citasTotales = listarCitas();



if (isset($_POST['borrar'])) {
    $borrar = $_POST['borrar'];
    $nFilas = count($borrar);

    for ($i = 0; $i < $nFilas; $i++) {
        eliminarCita($borrar[$i]);
    }
}
?>











<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="../estilos/estilosAgenda.css">
</head>

<body>
    <?php
    require_once '../vista/cabeceraCerrarSesion.php';
    ?>


    <div id="cuerpo">
        <div id="izquierda">
            <br />
        </div>
        <div id="centro">
            <h2>Listado de citas</h2>
            <form action="" method="post">
                <input type="submit" value="borrar">
                <table id="tabla">
                    <thead>
                        <th>Código Cita</th>
                        <th>Fecha y Hora</th>
                        <th>Tipo servicio</th>
                        <th>Descripción Servicio</th>
                        <th>Borrar</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($citasTotales as $clave => $valor) {
                            echo '<tr>';
                            echo '<td>' . $valor->codCita . '</td>';
                            echo '<td>' . $valor->fechaHora . '</td>';
                            echo '<td>' . $valor->nombre . '</td>';
                            echo '<td>' . $valor->descripcion . '</td>';
                            echo "<TD><INPUT TYPE='CHECKBOX' NAME='borrar[]'</TD>";
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </form>
        </div>
        <div id="derecha">
            <br />
        </div>
    </div>

</body>

</html>