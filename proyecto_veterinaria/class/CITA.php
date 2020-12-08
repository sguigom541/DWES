<?php
    class Cita 
    {
        //propiedades de la clase cita
        private $fechaCita;
        private $codUsuario;
        private $observaciones;
        private $realizada;
        private $duracion;

        //métodos de acceso


        /**
         * @return Date retorna la fecha de la cita
         */
        public function getFechaCita(){
            return $this->fechaCita;
        }
        
        /**
         * @param $nuevaFechaCita establece la nueva fecha de la cita en formato Date
         */
        public function setFechaCita( $nuevaFechaCita){
            $this->fechaCita=$nuevaFechaCita;
        }

        /**
         * @return String retorna el código del usuario
         */
        public function getCodUsuario(){
            return $this->codUsuario;
        }

        /**
         * @param $nuevoCodUsuario establece el código del usuario
         */
        public function setCodUsuario($nuevoCodUsuario){
            $this->codUsuario=$nuevoCodUsuario;
        }

        /**
         * @return String retorna las observaciones de la cita
         */
        public function getObservaciones(){
            return $this->observaciones;
        }

        /**
         * @param $nuevaObservacion establece unas nuevas observaciones de la cita
         */
        public function setObservaciones($nuevaObservacion){
            $this->observaciones=$nuevaObservacion;
        }

        /**
         * @return boolean retorna true si se ha realizado la cita
         */
        public function getRealizada(){
            return $this->realizada;
        }

        /**
         * @param $nuevaRealizada establece si la cita se ha realizado o no
         */
        public function setRealizada($nuevaRealizada){
            $this->realizada=$nuevaRealizada;
        }

        /**
         * @return String retorna la duración de la cita
         */
        public function getDuracion(){
            return $this->duracion;
        }

        /**
         * @param $nuevaDuracion establece una nueva duración de la cita
         */
        public function setDuracion($nuevaDuracion){
            $this->duracion=$nuevaDuracion;
        }
    }
    
?>