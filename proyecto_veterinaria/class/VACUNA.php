<?php
    class Vacuna{
        private $codVacuna;
        private $nombre;

        /**
         * @return String retorna el código de la vacuna
         */
        public function getCodVacuna(){
            return $this->codVacuna;
        }
        /**
         * @param $newCodGenero establece el código de la vacuna 
         */
        public function setCodVacuna($newCodVacuna){
            $this->codVacuna=$newCodVacuna;
        }
        /**
         * @return String retorna el nombre de la vacuna (rábica,parvovirus, etc)
         */
        public function getNombre(){
            return $this->nombre;
        }
        /**
         * @param $newNombre establece el nombre de la vacuna
         */
        public function setNombre($newNombre){
            $this->nombre=$newNombre;
        }
    }


?>