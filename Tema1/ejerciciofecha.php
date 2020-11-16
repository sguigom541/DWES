<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajo_Con_Fechas</title>
</head>
<body>
    <?php
            //declaro variables
            date_default_timezone_set('Europe/Madrid');
            $numMes=date("m");
            $numDiaSemana=date("N");

            //empieza el programa

            //Realizo un Switch para los meses del año
            switch($numMes)
            {
                case 1:
                    $mes="Enero";
                break;
                case 2:
                    $mes="Febrero";
                break;
                case 3:
                    $mes="Marzo";
                break;
                case 4:
                    $mes="Abril";
                break;
                case 5:
                    $mes="Mayo";
                break;
                case 6:
                    $mes="Junio";
                break;
                case 7:
                    $mes="Julio";
                break;
                case 8:
                    $mes="Agosto";
                break;
                case 9:
                    $mes="Septiembre";
                break;
                case 10:
                    $mes="Octubre";
                break;
                case 11:
                    $mes="Noviembre";
                break;
                case 12:
                    $mes="Diciembre";
                break;

            }
            //Otro Switch para los días de la semana
            switch($numDiaSemana)
            {
                case 1: $dia_semana = "Lunes";
                break;
                case 2: $dia_semana = "Martes";
                break;
                case 3: $dia_semana = "Miércoles";
                break;
                case 4: $dia_semana = "Jueves";
                break;
                case 5: $dia_semana = "Viernes";
                break;
                case 6: $dia_semana = "Sábado";
                break;
                case 7: $dia_semana = "Domingo";
                break;
            }
                
        print $dia_semana. ",".date("j")." de ".$mes." de ".date("Y");
    ?>
</body>
</html>