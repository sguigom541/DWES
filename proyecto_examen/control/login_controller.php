<?php
    require_once('GBD.inc.php');
    
    $dni=$_POST['dni'];
    $pass=$_POST['pass'];
    $codExamen=$_POST['codExamen'];
    if(BD::verificarAlumno($dni,$pass))
    {
        if(BD::verificarExamen($codExamen))
        {
            $alumno=BD::devolverAlumno($dni);
            session_start();
            $_SESSION['alumno']=$alumno;
            $_SESSION['codExamen']=$codExamen;
            header("Location:../vista/preExamen.php");

        }
    }
    else
    {
        header("Location:../vista/login.php");
    }
?>