<?php
    require_once('GBD.inc.php');
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
    session_start();
    date_default_timezone_set("Europe/Madrid");
    $alumno=$_SESSION['alumno'];
    $codExamen=$_SESSION['codExamen'];
        //verificamos que existe el usuario
        if(BD::verificarAlumno($alumno->getDNI(),$alumno->getPassword()))
        {
            //verificamos que existe el examen
            if(BD::verificarExamen($codExamen))
            {

                $examen=BD::devolverExamen($codExamen);
                $_SESSION['examen']=$examen;
                $fechaHoraInicio=new DateTime();
                $fechaHoraInicio=$fechaHoraInicio->format('Y-m-d H:i:s');
                $_SESSION['fechaHoraInicio']=$fechaHoraInicio;
                $dniAlu=$alumno->getDni();
                $fechaInicioExamen=$examen->getFechaHoraComienzo();
                $fechaFinExamen=$examen->getFechaHoraFin();
                

                if(!BD::verificarExamenAlumno($codExamen,$dniAlu))
                {
                    if($fechaHoraInicio>=$fechaInicioExamen && $fechaHoraInicio<=$fechaFinExamen)
                    {
                        header("Location:../vista/examen.php");
                    }
                    else if($fechaHoraInicio>$fechaInicioExamen){
                        header("Location:../vista/examenFueraHora.php?pasado=1");
                    }
                    else{
                        header("Location:../vista/examenFueraHora.php");
                    }
                }
                else{
                    header("Location:../vista/revisar-examen.php?re=0");
                }
                
            }
        }
        else
            {   
                header("Location:../vista/login.php");
            }
?>