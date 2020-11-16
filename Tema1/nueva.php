<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //declaro variables
        
        $mi_entero = 3;
        $mi_real= 2.3;
        
        //calculo
        $resultado= $mi_entero + $mi_real;
        
        echo "El resultado es: $resultado";//cuando usamos doble comilla en php la variable sustituye su valor
        
        echo 'El resultado es: $resultado';// cuando usamos comilla simple todo se convierte a cadena

        function prueba()
        {
            //para usar una variable externa se pone
            global $mi_entero ;
        }
        function contador()
        {
            //para que el valor de una variable no se pierda se puede usar una variable estática
            static $estatica=0;
            
            $estatica++;
        }
    
    
    ?>
</body>
</html>