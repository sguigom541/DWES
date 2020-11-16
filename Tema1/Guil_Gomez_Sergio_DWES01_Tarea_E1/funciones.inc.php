<?php
    /**
     * calcula una edad a partir de una string formato fecha
     * @param string $fecha_nac una fecha de nacimiento en formato string yyyy-MM-dd
     * @return int retorna la edad convertida a entero
     */
    function devuelveEdad($fecha_nac)
    {
        $cumple=new DateTime($fecha_nac);
        $hoy=new DateTime();
        $anios=$hoy->diff($cumple);
         return  $anios->y;
    };

    /**
     * se valida un email
     * @param string $email se le pasa un email
     * @return boolean retorna true si el formato de email es correcto
     */
    function emailvalido($email)
    {

        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return true;
        }

    }
    /**
     * Quita los espacios en blanco al final y al principio de la cadena
     * @param string $str una cadena
     * @return string $formatStr retorna la cadena formateada sin espacios al principio y al final
     */
    function quitarEspacios($str)
    {
        $formatStr=trim($str);

        return $formatStr;
    }

    /**
     * Valida un nombre que empiece por mayúscula 
     * @param string $str una cadena
     * @return boolean si la cadena concuerda con el filtro
     */
    function validarnombre($str)
    {
        $buena=preg_match("/^(?!.* $)[A-Z][a-z ]+$/",$str);
        if($buena==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /**
     * Valida un nombre que empiece por mayúscula 
     * @param string $str una cadena
     * @return boolean si la cadena concuerda con el filtro
     */
    function validartelefono($telefono)
    {
        $buena=preg_match("/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/",$telefono);
        if($buena==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /**
     * Valida un nombre que empiece por mayúscula 
     * @param string $str una cadena
     * @return boolean si la cadena concuerda con el filtro
     */
    function validaURL ($url)
    {
        if (filter_var($url,FILTER_VALIDATE_URL))
        {
            return true;
        }
    }

    /**
     * Valida un nombre que empiece por mayúscula 
     * @param string $str una cadena
     * @return boolean si la cadena concuerda con el filtro
     */
    function validasueldo($sueldo)
    {
        $bueno = preg_match("/^[\d]{0,11}(.[\d]{1,2})?($|€)/",$sueldo);
        if($bueno==1)
        {

        return true;

        }
    }

    /**
     * Valida un nombre que empiece por mayúscula 
     * @param string $str una cadena
     * @return boolean si la cadena concuerda con el filtro
     */
    function validar_fecha($fecha)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$fecha))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
