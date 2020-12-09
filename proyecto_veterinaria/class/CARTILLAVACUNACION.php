<?php
/**
 * Clase que alberga la documentación a cerca de la cartilla de vacunación de una mascota
 */
class cartillaVacunacion
{
    //propiedades del a clase CartillaVacunacion

    
    private $codMascota;
    private $fechaVacunacion;
    private $observaciones;
    private $codVacuna;

    //métodos de acceso

    /**
     * @return String retorna el código de la mascota
     */
    public function getCodMascota(){
        return $this->codMascota;
    }
    /**
     * @param String $newCodMascota el nuevo código de la mascota
     */
    public function setCodMascota($newCodMascota){
         $this->codMascota=$newCodMascota;
    }

    /**
     * @return Date retorna la fecha de la vacunación de la mascota
     */
    public function getFechaVacunacion(){
        return $this->fechaVacunacion;
    }
    /**
     * @param Date $newFechaVacunacion la nueva fecha de vacunación
     */
    public function setFechaVacunacion($newFechaVacunacion){
         $this->fechaVacunacion=$newFechaVacunacion;
    }

    /**
     * @return String retorna las observaciones de la cartilla de vacunación
     */
    public function getObservaciones(){
        return $this->observaciones;
    }
    /**
     * @param String $newObservaciones establece unas nuevas observaciones 
     */
    public function setObservaciones($newObservaciones){
        return $this->observaciones=$newObservaciones;
    }

    /**
     * @return String retorna el código de la vacuna
     */
    public function getCodVacuna(){
        return $this->codVacuna;
    }
    /**
     * @param String $newCodVacuna el nuevo código de la vacuna
     */
    public function setCodVacuna($newCodVacuna){
        return $this->codVacuna=$newCodVacuna;
    }
}
?>