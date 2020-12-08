<?php

class Mascota
{
    //propiedades de la clase mascota
    private $codMascota;
    private $nombreMascota;
    private $fechaNac;
    private $imgMascota;
    private $codEspecie;
    private $codGenero;
    private $codUsuario;


    //métodos de acceso

    /**
     * @return String el código de la mascota
     */
    public function getCodMascota(){
        return $this->codMascota;
    }

    /**
     * @param String $nuevoCodMascota el nuevo código de la mascota
     */
    public function setCodMascota($nuevoCodMascota){
        $this->codMascota=$nuevoCodMascota;
    }

    /**
     * @return String el nombre de la mascota
     */
    public function getNombreMascota(){
        return $this->nombreMascota;
    }

    /**
     * @param String el nuevo nombre de la mascota
     */
    public function setNombreMascota($nuevoNombreMascota){
        $this->mascota=$nuevoNombreMascota;
    }

    /**
     * @return Date la fecha en que nació la mascota
     */
    public function getFechaNac(){
        return $this->fechaNac;
    }

    /**
     * @param Date la nueva fecha en la que nació la mascota
     */
    public function setFechaNac($nuevaFechaNacimiento){
        $this->fechaNac=$nuevaFechaNacimiento;
    }

    /**
     * @return String retorna la url donde se encuentra la imagen de la mascota
     */
    public function getImgMascota(){
        return $this->imgMascota;
    }

    /**
     * @param $nuevaImgMascota establece una nueva url con la localización de la imagen de la mascota
     */
    public function setImgMascota($nuevaImgMascota){
        $this->imgMascota=$nuevaImgMascota;
    }

    /**
     * @return String retorna el código al que pertenece la especie
     */
    public function getCodEspecie(){
        return $this->codEspecie;
    }

    /**
     * @param $nuevoCodEspecie establece un nuevo código de especie para la mascota
     */
    public function setCodEspecie($nuevoCodEspecie){
        $this->codEspecie=$nuevoCodEspecie;
    }

    /**
     * @return String retorna el código del género al que pertenece la especie
     */
    public function getCodGenero(){
        return $this->codGenero;
    }

    /**
     * @param $nuevoGenero establece un nuevo código de género para la mascota
     */
    public function setCodGenero($nuevoGenero){
        $this->codGenero=$nuevoGenero;
    }

    /**
     * @return String retorna el cod del dueño de la mascota
     */
    public function getCodUsuario(){
        return $this->codUsuario;
    }

    /**
     * @param $nuevoCodUsuario establece un nuevo código del dueño de la mascota
     */
    public function setCodUsuario($nuevoCodUsuario){
        $this->codUsuario=$nuevoCodUsuario;
    }

}
?>