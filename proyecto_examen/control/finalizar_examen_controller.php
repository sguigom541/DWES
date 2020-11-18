<?php
    require_once "GBD.inc.php";
    require_once "../modelo/PREGUNTA.php";
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
    require_once "funciones.inc.php";
    session_start();
    $examen=$_SESSION['examen'];
    $codExamen=$examen->getCodExamen();
    

?>