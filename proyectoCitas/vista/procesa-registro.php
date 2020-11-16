<?php
    require_once('../control/gbd.inc.php');

    $username=$_POST['username'];
    $pass=$_POST['password'];
    $nombre=$_POST['firstName'];
    $apellido1=$_POST['lastName1'];
    $apellido2=$_POST['lastName2'];
    $email=$_POST['email'];
    $telefono=$_POST['telefono'];
    
    if(crearUsuario($username,$pass,$nombre,$apellido1,$apellido2,$email,$telefono))
    {
       //iniciamos sesion
       session_start();
       //metemos dentro de la sesión al usuario
       $_SESSION['usuario']=$username;

       header('Location: menuUsuario.php');
    }
    else
    {
       header('Location: login.php');
    }
    

?>