<?php
    Sesion::iniciar();
    //setcookie('recuerdame',Sesion::leer('usuario'),time()-10);
    //Sesion::eliminarSesion();
    session_destroy();
    //echo Sesion::eliminar('usuario');
    //echo Sesion::eliminar('pass');
    //print_r($_SESSION);
    header("location:?menu=inicio");

?>