<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ErrorExamen</title>
    <link rel="stylesheet" href="../estilos/estilosError.css">
</head>
<?php
require_once '../control/GBD.inc.php';
require_once '../modelo/ALUMNO.php';
require_once '../modelo/EXAMEN.php';
require_once '../control/funciones.inc.php';
session_start();
?>

<body>
    <?php
    //include_once '../vista/examen.php';
    $codigo = $_SESSION['codExamen'];
    $examen = $_SESSION['examen'];
    $fechaInicioExamen = new DateTime($examen->getFechaHoraComienzo());
    $fechaFinExamen = new DateTime($examen->getFechaHoraFin());

    $diaInicio = $fechaInicioExamen->format('d');
    $mesInicio = $fechaInicioExamen->format('m');
    $anioInicio = $fechaInicioExamen->format('Y');
    $horaInicio = $fechaInicioExamen->format('G');
    $minutoInicio = $fechaInicioExamen->format('i');

    $diaFin = $fechaFinExamen->format('d');
    $mesFin = $fechaFinExamen->format('m');
    $anioFin = $fechaFinExamen->format('Y');
    $horaFin = $fechaFinExamen->format('G');
    $minutoFin = $fechaFinExamen->format('i');

    $fechaInicio = $diaInicio . "/" . $mesInicio . "/" . $anioInicio;
    $fechaFin = $diaFin . "/" . $mesFin . "/" . $anioFin;
    $horaInicial = $horaInicio . ":" . $minutoInicio;
    $horaFinal = $horaFin . ":" . $minutoFin;

    if (isset($_GET['pasado'])) {
        echo ("
            <div class'error'>
                <h1>La fecha para realizar el examen ha expirado</h1>

                <p> El examen podia realizarse a partir del día $fechaInicio
                    desde las $horaInicial hasta las $horaFinal</p>
            <div class='boton'>
                <a class='botonSalida' href='../control/logOff_controller.php'>Salir</a>
            </div>");
    }
    else{
        echo ("
            <div class'error'>
                <h1>No Puede realizar el examen en este momento</h1>

                <p> El examen empezará a partir del día $fechaInicio
                    desde las $horaInicial hasta las $horaFinal</p>
            <div class='boton'>
                <a class='botonSalida' href='../control/logOff_controller.php'>Salir</a>
            </div>");
    }
    ?>
</body>

</html>