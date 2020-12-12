<?php
    Sesion::iniciar();
    //setcookie('recuerdame',Sesion::leer('usuario'),time()-10);
    Sesion::eliminar('usuario');
    Sesion::eliminar('pass');
    header("location:?menu=inicio");

?>