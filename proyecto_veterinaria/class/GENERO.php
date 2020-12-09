<?php
    class genero{
        private $codGenero;
        private $nombre;

        /**
         * @return String retorna el código del género del animal
         */
        public function getCodGenero(){
            return $this->codGenero;
        }
        /**
         * @param $newCodGenero establece el código del género del animal
         */
        public function setCodGenero($newCodGenero){
            $this->codGenero=$newCodGenero;
        }
        /**
         * @return String retorna el nombre del género(masculino,femenino,etc)
         */
        public function getNombre(){
            return $this->nombre;
        }
        /**
         * @param $newNombre establece el nombre del género
         */
        public function setNombre($newNombre){
            $this->nombre=$newNombre;
        }
    }

?>