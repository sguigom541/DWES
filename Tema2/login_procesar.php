<?php
require "GBD.inc.php";
$conex=abrirconexion('localhost','userprueba','abc123.','prueba');
if(comprobarusuario($_POST['usuario'],$_POST['password'],$conex))
{
    header("Location:bienvenido.php?user=".$_POST['usuario']);
}
else
{
    header("Location:login.php?redirigido");
}
cerrarconexion($conex);
?>