<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conexion = new mysqli('localhost', 'dwes', 'dwes', 'dwes');

        print $conexion->server_info;

    ?>
</body>
</html>