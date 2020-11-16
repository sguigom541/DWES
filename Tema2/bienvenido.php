<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "GBD.inc.php";
    $user=$_GET['user'];
    $conex=abrirconexion('localhost','userprueba','abc123.','prueba');
    echo "Bienvenido ".$_GET['user']."<br/>";

    $telefonos=telefonosUsuario($user,$conex);
    echo "sus telefonos son:"."<br/>";
    
    foreach ($telefonos as $key )
    {
        echo $key[0]."<br/>";
    }

    ?>
</body>
</html>