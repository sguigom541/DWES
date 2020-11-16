<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="script/validator.js"></script>
    <link rel="stylesheet" href="../estilos/estilosLogin.css">
    <link rel="shortcut icon" href="../img/favicon-login.png" type="image/x-icon">
    <script src="../script/validator.js"></script>
    
</head>
<body>
    <div class="header">
        <p></p>
        <img src="" alt="" srcset="">
    </div>
    <div class="login-box">
        <h1>Login</h1>
        <form action="../control/login_controller.php" method="post">
            <!--Nombre de usuario-->
           <label for="username"></label>
           <input type="text" id ="dni" name="dni" placeholder="Ingrese su dni"/>

           <!--Contraseña-->
           <label for="password"></label>
           <input type="password" id="password" name="pass" placeholder="Ingrese su contraseña"/>
           <label for="mostrar">Mostrar Contraseña</label><input type="checkbox" id="mostrar_password">
           
           

           <!--Cod examen-->
            <label for="código Examen"></label>
            <input type="text" name="codExamen" id="codExamen" placeholder="Ingrese el código del examen"/>
            <!--el botón de acceder-->
           <input type="submit" value="Acceder">
        </form>
    </div>
</body>
</html>