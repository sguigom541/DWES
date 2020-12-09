<?php
    class partecuerpochip{
        private $codParteCuerpo;
        private $lugarImplantacion;
        /**
         * @return String retorna el código de la parte del cuerpo del animal(perro, gato, etc)
         */
        public function getCodParteCuerpo(){
            return $this->codParteCuerpo;
        }
        /**
         * @param $newLugarImplantacion establece el código de la parte del cuerpo del animal(perro,gato, etc)
         */
        public function setCodParteCuerpo($newCodParteCuerpo){
            $this->codParteCuerpo=$newCodParteCuerpo;
        }

        /**
         * @return String retorna el lugar de implantación del chip del animal
         */
        public function lugarImplantacion(){
            return $this->lugarImplantacion;
        }
        /**
         * @param $newLugarImplantacion establece el lugar de implantación del chip en el animal
         */
        public function setNombre($newLugarImplantacion){
            $this->lugarImplantacion=$newLugarImplantacion;
        }
    }

?>