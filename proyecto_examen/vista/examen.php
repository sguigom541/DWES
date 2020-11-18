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
$alumno = $_SESSION['alumno'];
$examen = $_SESSION['examen'];

?>

<body>
    <!--cabecera-->
    <?php
    require_once "../vista/cabecera.php";
    ?>
    <div id="examen">
        <div>
            <div id="izq">
                <div id="preguntas-contestadas">
                    <h2>Preguntas Contestadas</h2>
                    <!--<input class="rango" type="range" name="" id="" min="1" disabled=true>-->

                </div>

                <div id="tiempo-Restante">
                    <h2>Tiempo restante</h2>
                    <p id="tiempo">00:40:00</p>
                </div>

                <div id="enviar-examen">
                    <h2>Enviar Examen</h2>
                <input type="button"  id="enviar" value="enviar" />
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