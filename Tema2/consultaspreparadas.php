<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        @ $dwes = new mysqli('localhost', 'dwes', 'dwes', 'dwes');

        $consulta= $dwes->stmt_init();

        $consulta->prepare('SELECT producto, unidades FROM stock WHERE unidades<?');
        $num_unidades=2;
        $consulta->bind_param('i', $num_unidades);
        $consulta->execute();
        $consulta->bind_result($producto,$unidades);
        while($consulta->fetch()) {
            print "<p>Producto $producto: $unidades unidades.</p>";
        }
    ?>
</body>
</html>