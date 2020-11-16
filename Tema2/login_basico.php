<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="login_procesar.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario"/>

        <label for="contrasenia"></label>
        <input type="text" name="password"/>
        
        <input type="submit" value="enviar"/>
    </form>

    <?php
    if (isset($_GET['redirigido']))
    {
        echo "usuario incorrecto";
    }
    ?>
</body>
</html>