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

        $resultado = $dwes->query('SELECT producto, unidades FROM stock WHERE unidades<2');

        $stock = $resultado->fetch_object();
    

    ?>
    <form name="formu">
        <label for="producto">producto</label>
        <input type="text" name="producto" value="<?php  echo $stock->producto;?>">
        <label for="unidades">unidades</label>
        <input type="text" name="unidades" value="<?php  echo $stock->unidades;?>">
    </form>
    
</body>
</html>