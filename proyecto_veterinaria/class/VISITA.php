<?php
    class visita{
        //declaracion de propiedades de la clase visita
        private $fechaVisita;
        private $codMascota;
        private $motivoVisita;
        private $problemasDetectados;
        private $tratamiento;
        private $observaciones;
        private $fechaProximaVisita;
        private $fechaCita;


        //métodos de acceso

        /**
         * @return Date retorna la fecha de la visita
         */
        public function getFechaVisita(){
            return $this->fechaVisita;
        }

        /**
         * @param $nuevaFechaVisita establece la nueva fecha de la visita
         */
        public function setFechaVisita($nuevaFechaVisita){
            $this->fechaVisita=$nuevaFechaVisita;
        }
        /**
         *  @return String retorna el código de la mascota
         */
        public function getCodMascota(){
            return $this->codMascota;
        }

        /**
         * @param $nuevoCodMascota establece el código de la mascota
         */
        public function setCodMascota($nuevoCodMascota){
            $this->codMascota=$nuevoCodMascota;
        }
        /**
         * @return String retorna el mótivo de la visita
         */
        public function getMotivoVisita(){
            return $this->motivoVisita;
        }

        /**
         * @param $nuevoMotivoVisita establece el mótivo de la visita
         */
        public function setMotivoVisita($nuevoMotivoVisita){
            $this->motivoVisita=$nuevoMotivoVisita;
        }
        /**
         * @return String retorna los problemas detectados en la visita
         */
        public function getProblemasDetectados(){
            return $this->problemasDetectados;
        }

        /**
         * @param $nuevosProblemasDetectados establece los problemas detectados
         */
        public function setProblemasDetectados($nuevosProblemasDetectados){
            $this->problemasDetectados=$nuevosProblemasDetectados;
        }
        /**
         * @return String retorna el tratamiento establecido
         */
        public function getTratamiento(){
            return $this->tratamiento;
        }
        /**
         * @param $nuevoTratamiento establece el tratamiento
         */
        public function setTratamiento($nuevoTratamiento){
            $this->tratamiento=$nuevoTratamiento;
        }
        /**
         * @return String retorna las observaciones de la visita
         */
        public function getObservaciones(){
            return $this->observaciones;
        }
        /**
         * @param $nuevasObservaciones establece las observaciones de la visita
         */
        public function setObservaciones($nuevasObservaciones){
            $this->observaciones=$nuevasObservaciones;
        }
        
        /**
         * @return Date retorna la fecha de la cita en el caso de que esté establecida una cita el mismo día y hora que la visita
         */
        public function getFechaCita(){
            return $this->fechaCita;
        }

        /**
         * @param $nuevaFechaCita establece una nueva fecha de la cita
         */
        public function setFechaCita($nuevaFechaCita){
            $this->fechaCita=$nuevaFechaCita;
        }


    }


?>