<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link rel="stylesheet" href="../estilos/estilosExam.css">
    <script src="../script/libreria.js"></script>
</head>

<?php

require_once "../control/GBD.inc.php";
require_once "../modelo/PREGUNTA.php";
require_once "../modelo/ALUMNO.php";
require_once "../modelo/EXAMEN.php";
require_once "../control/funciones.inc.php";
session_start();
date_default_timezone_set('Europe/Madrid');
$alumno = $_SESSION['alumno'];
$examen = $_SESSION['examen'];

?>

<body>
    <!--cabecera-->
    <?php
    require_once "../vista/cabeceraLogOff.php";
    ?>
    <div id="examen">
        <div>
            <div id="izq">
                <div id="progressBar">
                    <div id="myBar"></div>
                </div>
                <?php
                    
                    $fechaInicioExamen=$examen->getFechaHoraComienzo();
                    $fechaFinExamen=$examen->getFechaHoraFin();
                    $duracion=$examen->getDuracion();
                    $fechaActual=new DateTime();
                    $fechaInicioExamen=new DateTime($fechaInicioExamen);
                    $fechaFinExamen=new DateTime($fechaFinExamen);
                    $duracion=new DateTime($duracion);
                    $diferencia=$fechaFinExamen->diff($fechaActual);

                    $fechaInicioExamen=$fechaInicioExamen->format('H:i:s');
                    $fechaFinExamen=$fechaFinExamen->format('H:i:s');
                    $duracion=$duracion->format('H:i:s');
                    $diferencia=$diferencia->format('%H:%I:%s');

                    if($diferencia>$duracion)
                    {
                        $temporizador=$duracion;
                    }else{
                        $resta1=new DateTime($duracion);
                        $resta2=new DateTime($diferencia);
                        $dif=($resta1->diff($resta2))->format('%H:%I:%s');
                        $prueba=new DateTime($dif);
                        $temporizador=$resta1->diff($prueba);
                        $temporizador=$temporizador->format('%H:%I:%s');
                    }
                ?>
                <div id="tiempo-Restante">
                    <h2>Tiempo restante</h2>
                    <p id="hora"><?php echo $temporizador ?></p>
                </div>
                
                <div id="enviar-examen">
                    <h2>Enviar Examen</h2>
                    <input type="button" id="enviar" value="enviar" />
                </div>
            </div>
            <form action="../control/finalizar_examen_controller.php" method="POST" id="formulario">
                <div id="centro">

                    <?php

                    $arrayPreguntas = BD::obtenerPreguntasExamen($examen->getCodExamen());
                    crearExamen($arrayPreguntas);
                    ?>

                    <div id="botonera">
                        <button type="button" name="boton-anterior" id="boton-anterior">Anterior</button>
                        <button type="button" name="boton-siguiente" id="boton-siguiente">Siguiente</button>
                    </div>

                </div>
            </form>

        </div>

    </div>
</body>

</html>