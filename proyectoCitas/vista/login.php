<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../estilos/estilos-login.css">
</head>
<body>
    <div class="login-box">
        <img src="../img/logo.png" class="avatar" alt="Avatar Image">
        <h1>Login Here</h1>
        <form action="procesa-login.php" method="POST">
          <!-- USERNAME INPUT -->
          <label for="username">Username</label>
          <input type="text" name="usuario" placeholder="Enter Username">
          <!-- PASSWORD INPUT -->
          <label for="password">Password</label>
          <input type="password" name="pass" placeholder="Enter Password">
          <input type="submit" value="Log In">
          <a href="../vista/registro.php">¿No tiene cuenta?.Regístrese</a>
        </form>
      </div>
    
</body>
</html>