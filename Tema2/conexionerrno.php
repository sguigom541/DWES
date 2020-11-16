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
       
       if ($error != null) 
       {
       
            echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";
       
            exit();
       
       }
       else
       {
           print("Conexion correcta");
       }
    ?>
</body>
</html>