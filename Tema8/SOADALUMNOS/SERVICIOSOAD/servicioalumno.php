<?php

class servicioalumno
{
    /**
     * @soap
     *
     * @param [string] $nombre
     * @return string 
     */
    public function devolvernombre($nombre)
    {
        $respuesta="hola $nombre";
        return $respuesta;
    }
}