<?php

$a = new GBD("localhost", "sggveterinaria", "root", "");

//validamos el login
$valida = new Validacion();
if (isset($_POST['enviar'])) {
    $valida->Requerido('username');
    $valida->Requerido('pass');
    if ($valida->ValidacionPasada()) {
        if (Login::Identifica($_POST['username'], $_POST['pass'])) {
            $arrayClaveRol = [$_POST['username']];
            $rol = $gbd->findById("usuario", $arrayClaveRol);

            //ahora redirigimos al menu correspondiente dependiendo del rol
            $url = $rol[0]->getCodigoRol();
            header("location:?rol=" . $url);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login |  clínica Veterinaria</title>
</head>

<body>
    <section id="container-form">
        <form action="" method="post">
            
            <h3 id="tituloLogin">Iniciar Sesión</h3>
            <img src="./img/imgLogin/login.png" alt="Login">

            <input type="text" name="username" placeholder="Usuario">
            <p><?php echo $valida->ImprimirError('username')?></p>
            <input type="password" name="pass" id="" placeholder="Contraseña">
            <p><?php echo $valida->ImprimirError('pass')?></p>
            <input type="submit" name="enviar" value="ENTRAR">
        </form>
    </section>

</body>

</html>