<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba subida ficheros</title>
</head>

<body>
    <!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
    <form enctype="multipart/form-data" action="uploadFile_controller.php" method="POST">
        <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
        Enviar este fichero: <input name="fichero_usuario" type="file" />
        <input type="submit" value="Enviar fichero" />
    </form>
</body>

</html>