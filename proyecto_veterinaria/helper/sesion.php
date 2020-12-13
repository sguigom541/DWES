<?php
class sesion
    {
        
       
       public static function iniciar()
       {
           if (!isset($_SESSION)) {
               session_start();
           }
       }

       
       public static function leer($clave)
       {
           return isset($_SESSION[$clave]) ? $_SESSION[$clave] : "";
       }

       
       public static function existe($clave)
       {
           return isset($_SESSION[$clave]) ? true : false;
       }


       
       
       public static function escribir($clave, $valor)
       {
           $_SESSION[$clave] = $valor;
       }
       
       public static function eliminar($clave)
       {
           unset($_SESSION[$clave]);
       }
    }
?>