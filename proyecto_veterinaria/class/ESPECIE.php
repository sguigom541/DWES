<?php
    class especie{
        private $codEspecie;
        private $nombre;
        private $chipeable;

        /**
         * @return String retorna el código de la especie del animal
         */
        public function getCodEspecie(){
            return $this->codEspecie;
        }
        /**
         * @param $newCodEspecie establece el código de la especie del animal
         */
        public function setCodGenero($newCodEspecie){
            $this->codEspecie=$newCodEspecie;
        }
        /**
         * @return String retorna el nombre de la especie del animal(perro, gato, etc)
         */
        public function getNombre(){
            return $this->nombre;
        }
        /**
         * @param $newNombre establece el nombre de la especie animal
         */
        public function setNombre($newNombre){
            $this->nombre=$newNombre;
        }

        /**
         * @return Boolean retorna true si al animal se le puede poner chip
         * 
         */
        public function getChipeable(){
            return $this->chipeable;
        }

        /**
         * @param $newNombre establece si al animal se le puede poner chip
         */
        public function setChipeable($newChipeable){
            $this->chipeable=$newChipeable;
        }

    }


?>