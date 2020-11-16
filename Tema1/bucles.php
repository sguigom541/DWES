<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $modulos = array("PR" => "Programación", "BD" => "Bases de datos",  "DWES" => "Desarrollo web en entorno servidor");
        foreach ($modulos as $modulo) 
        {
            print "Módulo: ".$modulo. "<br />";
        }

        $modulos = array("PR" => "Programación", "BD" => "Bases de datos",  "DWES" => "Desarrollo web en entorno servidor");
        foreach ($modulos as $codigo => $modulo) 
        {
            print "El código del módulo ".$modulo." es ".$codigo."<br />";
        }
    ?>
</body>
</html>