<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>revisión</title>
</head>

<?php
    require_once "../control/GBD.inc.php";
    require_once "../modelo/PREGUNTA.php";
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
    require_once "../control/funciones.inc.php";
    session_start();
?>
<body>
    <?php
    include_once "cabecera.php";
        $alumno = $_SESSION['alumno'];
        $examen= $_SESSION['examen'];
        $dni=$alumno->getDni();
        $nombre=$alumno->getNombre();
        $ape1=$alumno->getApe1();
        $ape2=$alumno->getApe2();
        $codExamen=$examen->getCodExamen();
    ?>

    <h1>Examen <?php echo $codExamen ?></h1>
    <table class="tabla" style="background-color: #bbb;">
        <tr>
            <th>Nombre</th>
            <td><?php echo $nombre?></td>
        </tr>
        <tr>
            <th>Primer Apellido</th>
            <td><?php echo $ape1?></td>
        </tr>
        <tr>
            <th>Segundo Apellido</th>
            <td><?php echo $ape2?></td>
        </tr>
        <tr>
            <th>Aciertos</th>
            <td><?php echo $_SESSION['aciertos']?></td>
        </tr>
        <tr>
            <th>Fallos</th>
            <td><?php echo $_SESSION['fallos']?></td>
        </tr>
    </table>
</body>
</html>