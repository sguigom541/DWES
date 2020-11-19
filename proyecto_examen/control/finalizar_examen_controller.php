<?php
    require_once "GBD.inc.php";
    require_once "../modelo/PREGUNTA.php";
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
    require_once "../modelo/ALUMNOEXAMEN.php";
    require_once "funciones.inc.php";
    session_start();
    date_default_timezone_set("Europe/Madrid");
    $examen=$_SESSION['examen'];
    $codExamen=$examen->getCodExamen();
    $arrayPreguntas=BD::obtenerPreguntasExamen($codExamen);

    $arrayCount=count($arrayPreguntas);
    
    $respuestasSeleccionadasExamen="";
    for ($i=1; $i <=$arrayCount ; $i++) 
    { 
        $respuestasSeleccionadasExamen.=(empty($_POST['respuesta'.$i])) ? " ":$_POST['respuesta'.$i];    
        
    }

    $arrayRespuestasCorrectas=BD::respuestasCorrectas($codExamen);
    $respuestasCorrectas ="";
    foreach ($arrayRespuestasCorrectas as $key => $valor) 
    {
        $respuestasCorrectas .= $valor->respuestaCorrecta;
    }

    $correctas= "";

    for($i = 0; $i<$arrayCount;$i++){
        if($respuestasSeleccionadasExamen[$i]== $respuestasCorrectas[$i])
        {
            $correctas++;
        }
    }

    if($correctas!=0){
        $numeroCorrectas= $correctas;
        $numeroFallos=$arrayCount-$correctas;
        $nota=($correctas*100)/$arrayCount;

        //metemos en la sesion los aciertos,los fallos y la nota del examen

        $_SESSION['aciertos']=$numeroCorrectas;
        $_SESSION['fallos']=$numeroFallos;
        $_SESSION['nota']=$nota;
    }
    else{
        $_SESSION['aciertos']=0;
        $_SESSION['fallos']=$arrayCount;
        $_SESSION['nota']=0;
    }

    $fecha=new DateTime();
    
    $alumno=$_SESSION['alumno'];
    $dniAlumno=$alumno->getDni();
    
    $fechaHoraComienzo=$_SESSION['fechaHoraInicio'];
    $fechaFinExamen=new DateTime();
    $fechaFinExamen=$fechaFinExamen->format('Y-m-d H:i:s');
    $_SESSION['fechaHoraFin']=$fechaFinExamen;
    $alumnoRealizaExamen= new alumnoexamen;
    $alumnoRealizaExamen->setDNI($dniAlumno);
    $alumnoRealizaExamen->setCodExamen($codExamen);
    $alumnoRealizaExamen->setFechaHoraComienzo($fechaHoraComienzo);
    $alumnoRealizaExamen->setFechaHoraFin($fechaFinExamen);
    $alumnoRealizaExamen->setRespuesta($respuestasSeleccionadasExamen);
    
    BD::guardarExamenAlumno($alumnoRealizaExamen);
    header("Location:../vista/revisar-examen.php");
    
?>