<?php
    class rol
    {
        private $codRol;
        private $nombre;

        public function getCodRol()
        {
            return $this->codRol;
        }
        public function setCodRol($newCodRol)
        {
            $this->codRol=$newCodRol;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($newNombre)
        {
            $this->nombre=$newNombre;
        }
    }
?>