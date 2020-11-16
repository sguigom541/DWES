<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['nombre']))
        {
            if($_POST['nombre'])
            {
                $nombre = $_POST['nombre'];
                $modulos = $_POST['modulos'];
                print "Nombre: ".$nombre."<br/>";
                foreach ($modulos as $modulo)
                {
                    print "módulo".$modulo."<br/>";
                }
            }
            else
            {
                print " Por favor rellene el campo";
            }
            
        }
        else
        {
            print "Entra primero en el formulario por favor";
        }
    ?>
</body>
</html>