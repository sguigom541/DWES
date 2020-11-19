<?php
    require_once('GBD.inc.php');
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
    session_start();
    date_default_timezone_set("Europe/Madrid");
    $alumno=$_SESSION['alumno'];
    $codExamen=$_SESSION['codExamen'];
        //verificamos que existe
        if(BD::verificarAlumno($alumno->getDNI(),$alumno->getPassword()))
        {
            if(BD::verificarExamen($codExamen))
            {

                $examen=BD::devolverExamen($codExamen);
                $_SESSION['examen']=$examen;
                $fechaHoraInicio=new DateTime();
                $fechaHoraInicio=$fechaHoraInicio->format('Y-m-d H:i:s');
                $_SESSION['fechaHoraInicio']=$fechaHoraInicio;
                
                header("Location:../vista/examen.php");
            }
        }
        else
            {   
                header("Location:../vista/login.php");
            }
?>