<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'funcioneslogin.inc.php';
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) 
        {
            $usuario=$_POST['usuario'];
            $pass=$_POST['password'];
            //si se cumple la condición anterior entonces llamamos a la función
             usuariovalido($usuario,$pass);
        }
        else
        {
    ?>   
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
            <p>Usuario:</p>
            <input type="text" name="usuario" value="<?php if (isset ($_POST['usuario'])) echo $_POST['usuario'];?>" />
            <?php
               if (isset($_POST['enviar']) && empty($_POST['usuario'])) //si pulsamos el botón enviar y usuario está vacío muestro un aviso
                    echo "<span style='color:red'> &lt;-- Debe introducir un usuario!!</span>"
          ?><br />
            <p>Contraseña:</p>
            <input type="password" name="password"/>
            <?php
               if (isset($_POST['enviar']) && empty($_POST['password'])) //si pulso el botón enviar y la contraseña está vacía muestro un aviso
                    echo "<span style='color:red'> &lt;-- Introduzca una contraseña por favor!!</span>"
             ?><br />
            <input type="submit" value="Enviar" name="enviar"/>
        </form>

    <?php    

        }
    ?>
    
</body>
</html>