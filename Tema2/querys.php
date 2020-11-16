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

        $error = $dwes->connect_errno;
        
        if ($error == null) {
        
            $resultado = $dwes->query('UPDATE `dwes`.`stock`
            SET
            `producto` = <{producto: }>,
            `tienda` = <{tienda: }>,
            `unidades` = <{unidades:unidades+1 }>
            WHERE `unidades`>2
            ');//sumar uno 1 a aquellos que tengan mas de tres unidades
        
            if ($resultado) {
        
                print "<p>Se han borrado $dwes->affected_rows registros.</p>";
        
            }
        
            $dwes->close();
        
        }

    ?>
</body>
</html>