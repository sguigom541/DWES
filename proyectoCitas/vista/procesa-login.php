<?php
    require_once('../control/gbd.inc.php');
    //se comprueba si existe el usuario si no se redirige al login
    if(comprobarUsuario($_POST['usuario'],$_POST['pass']))
    {
        
        $usuario=$_POST['usuario'];
        //iniciamos sesion
        session_start();
        $rol=rolUsuario($usuario);
        if($rol[0]->codRol ==2)
        {
            //metemos dentro de la sesión al usuario
            $_SESSION['usuario']=$usuario;//srbarro
            header('Location: menuAdmin.php');
        }
        else
        {
            $_SESSION['usuario']=$usuario;//usuario normal
            header('Location: menuUsuario.php');
        }
        
        
    }
    else
    {
        header('Location: login.php');
    }




    
?>