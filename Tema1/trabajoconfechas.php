<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        // Incluimos la libreria y empieza el programa
        date_default_timezone_set('Europe/Madrid');
        include 'funcionesfecha.inc.php';
        $date = date_create();
        $cadena_fecha_actual = date_format($date, 'Y-m-d H:i:s');
        
        //funcion que diga si es tarde o mañana
        echo horadeldia($cadena_fecha_actual);
        //funcion que diga en que estación estamos
        echo estaciondelanio($cadena_fecha_actual);
        //funcion que dice en que trimestre estamos;
        echo 'Nos encontramos en el '.trimestredelanio($cadena_fecha_actual).' trimestre';
        
    ?>
</body>
</html>