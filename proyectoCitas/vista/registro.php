<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Registro</title>
    <link rel="stylesheet" href="../estilos/estilos-registro.css">
</head>
<body>
    <form id="form-register" action="procesa-registro.php" method="post">
        <h4>Formulario Registro</h4>
        <input class="inputs" type="text" name="username" placeholder="Introduzca su usuario"  maxlength="20"/>
        
        <input class="inputs" type="password" name="password" placeholder="Introduzca su contraseña"  maxlength="30"/>

        <input class="inputs" type="text" name="firstName" placeholder="Introduzca su Nombre"  maxlength="20" />

        <input class="inputs" type="text" name="lastName1" placeholder="Introduzca su primer apellido"  maxlength="30"/>

        <input class="inputs" type="text" name="lastName2" placeholder="Introduzca su segundo apellido"  maxlength="30"/>

        <input class="inputs" type="text" name="email" placeholder="Introduzca su correo"  maxlength="45"/>

        <input class="inputs" type="text" name="telefono" placeholder="Introduzca su teléfono de contacto"  maxlength="15"/>

        <input type="submit" name="enviar" value="Registrate"/>
        
        


    </form>
</body>
</html>