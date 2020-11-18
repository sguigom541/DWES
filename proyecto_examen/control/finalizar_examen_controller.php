<?php
    require_once "GBD.inc.php";
    require_once "../modelo/PREGUNTA.php";
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
    require_once "funciones.inc.php";
    session_start();
    $examen=$_SESSION['examen'];
    $codExamen=$examen->getCodExamen();
    $arrayPreguntas=BD::obtenerPreguntasExamen($codExamen);

    $arrayCount=count($arrayPreguntas);
    echo $arrayCount;
    $respuestasSeleccionadasExamen="";
    for ($i=1; $i <=$arrayCount ; $i++) 
    { 
        $respuestasSeleccionadasExamen.=(empty($_POST['respuesta'.$i])) ? " ":$_POST['respuesta'.$i];    
        echo $respuestasSeleccionadasExamen."<br/>";
    }

    echo $respuestasSeleccionadasExamen;
?>