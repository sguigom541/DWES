<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<br>";
        echo $_SERVER['PHP_SELF'];
        
        echo "<br>";
        echo $_SERVER['SERVER_ADDR'];

        echo "<br>";
        echo $_SERVER['SERVER_NAME'];

        echo "<br>";
        echo $_SERVER['DOCUMENT_ROOT'];

        echo "<br>";
        echo $_SERVER['REMOTE_ADDR'];

        echo "<br>";
        echo $_SERVER['REQUEST_METHOD'];

        echo "<br>";
        printf("El número PI vale %+.2f", 3.1416);
    ?>
</body>
</html>