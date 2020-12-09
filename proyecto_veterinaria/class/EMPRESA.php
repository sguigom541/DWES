<?php
    class empresa{
        //propiedades de la clase empresa

        private $cif;
        private $nombre;
        private $telefono;

        //metodos de acceso

        /**
         * @return String retorna el cif de la empresa
         */
        public function getCif(){
            return $this->cif;
        }
        /**
         * @param $nuevoCif establece el cif de la empresa
         */
        public function setCif($nuevoCif){
            $this->cif=$nuevoCif;
        }
        /**
         * @return String retorna el nombre de la empresa
         */
        public function getNombre(){
            return $this->nombre;
        }
        /**
         * @param $nuevoNombreEmpresa establece el nombre de la empresa
         */
        public function setNombre($nuevoNombreEmpresa){
            $this->nombre=$nuevoNombreEmpresa;
        }
        /**
         * @return String retorna el teléfono de la empresa
         */
        public function getTelefono(){
            return $this->telefono;
        }
        /**
         * @param $nuevoTelefono establece el teléfono de la empresa
         */
        public function setTelefono($nuevoTelefono){
            $this->telefono=$nuevoTelefono;
        }
    }


?>