
<?php 

    function horadeldia($fecha)
    {
        $hora= date("H",strtotime($fecha));

        return ($hora>='00' && $hora<='12')? 'Hola, estamos por la mañana' : 'Hola, estamos por la tarde';
    }

    
    function estaciondelanio($fecha)
    {
        $mes= date("m",strtotime($fecha));//Extraemos el mes de la cadena convertida a número

        if($mes>='01' && $mes<'03')
        {
            echo 'Nos encontramos en invierno';
        }
        elseif($mes>='03' && $mes<'06')
        {
            echo 'Nos encontramos en primavera';
        }
        elseif($mes>='06' && $mes<'09')
        {
            echo 'Nos encontramos en verano';
        }
        elseif($mes>='09' && $mes<'12')
        {
            echo 'Nos encontramos en otoño';
        }
    }

    function trimestredelanio($fecha)
    {
        $mes = date("m",strtotime($fecha));
        $mes = is_null($mes) ? date('m') : $mes;
        $trim=floor(($mes-1) / 3)+1;
        return $trim;
        
    }