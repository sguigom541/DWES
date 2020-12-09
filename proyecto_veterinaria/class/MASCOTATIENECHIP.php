<?php
    class mascotaTieneChip{
        private $codMascota;
        private $codChip;
        private $fechaImplantacion;
        private $codParteCuerpo;

        /**
         * @return String retorna el código de la mascota
         */
        public function getCodMascota(){
            $this->codMascota;
        }
        /**
         * @param $newCodMascota establece el código de la mascota
         */
        public function setCodMascota($newCodMascota){
            $this->codMascota=$newCodMascota;
        }
        /**
         * @return String retorna el código del chip
         */
        public function getCodChip(){
            $this->codChip;
        }
        /**
         * @param $newCodChip establece el código del chip
         */
        public function setCodChip($newCodChip){
            $this->codChip=$newCodChip;
        }
        /**
         * @return String retorna la fecha de implantación del chip
         */
        public function getFechaImplantacion(){
            $this->fechaImplantacion;
        }
        /**
         * @param $newfechaImplantacion establece la fecha de implantación del chip
         */
        public function setFechaImplantacion($newfechaImplantacion){
            $this->fechaImplantacion=$newfechaImplantacion;
        }
        /**
         * @return String retorna el código de la parte del cuerpo
         */
        public function getCodParteCuerpo(){
            $this->codParteCuerpo;
        }
        /**
         * @param $newCodParteCuerpo establece el código de la parte del cuerpo
         */
        public function setCodParteCuerpo($newCodParteCuerpo){
            $this->codParteCuerpo=$newCodParteCuerpo;
        }
    }

?>