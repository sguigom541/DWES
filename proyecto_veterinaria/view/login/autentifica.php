<?php
    
    $a=new GBD("localhost","sggveterinaria","root","");
    
    //validamos el login
    $valida=new Validacion();
    if(isset($_POST['enviar']))
    {
        $valida->Requerido('user');
        $valida->Requerido('pass');
        if($valida->ValidacionPasada())
        {
            if(Login::Identifica($_POST['user'],$_POST['pass']))
            {
                $arrayClaveRol=[$_POST['user']];
                $rol=$gbd->findById("usuario",$arrayClaveRol);

                //ahora redirigimos al menu correspondiente dependiendo del rol
                $url=$rol[0]->getCodigoRol();
                

            }
        }
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="login-box">
        <img src="../img/logo.png" class="avatar" alt="Avatar Image">
        <h1>Login Here</h1>
        <form action="procesa-login.php" method="POST">
          <!-- USERNAME INPUT -->
          <label for="username">Username</label>
          <input type="text" name="user" placeholder="Enter Username">
          <!-- PASSWORD INPUT -->
          <label for="password">Password</label>
          <input type="password" name="pass" placeholder="Enter Password">
          <input type="submit" value="Log In" name="enviar">
          <a href="../vista/registro.php">¿No tiene cuenta?.Regístrese</a>
        </form>
      </div>
</body>
</html>