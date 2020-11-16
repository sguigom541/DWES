<?php
    require_once('GBD.inc.php');
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
    session_start();
    $alumno=$_SESSION['alumno'];
    $codExamen=$_SESSION['codExamen'];
    if(BD::verificarExamenAlumno($codExamen,$alumno->getDNI()))
    {
        $examen=BD::devolverExamen($codExamen);
        $_SESSION['examen']=$examen;
        header("Location:../vista/examen.php");
    }
    else{
        header("Location:../vista/login.php");
    }
?>