<?php
    class alumnoexamen
    {
        private $dni;
        private $codExamen;
        private $fechaHoraComienzo;
        private $fechaHoraFin;
        private $respuesta;

        
        
        public function getDNI(){return $this->dni;}
        public function setDNI($newDNI){$this->dni=$newDNI;}
        public function getCodExamen(){return $this->codExamen;}
        public function setCodExamen($newCodExamen){$this->codExamen=$newCodExamen;}
        public function getFechaHoraComienzo(){return $this->fechaHoraComienzo;}
        public function setFechaHoraComienzo($nuevaFechaHoraComienzo){$this->fechaHoraComienzo=$nuevaFechaHoraComienzo;}
        public function getFechaHoraFin(){return $this->fechaHoraFin;}
        public function setFechaHoraFin($nuevaFechaHoraFin){$this->fechaHoraFin=$nuevaFechaHoraFin;}
        public function getRespuesta(){return $this->respuesta;}
        public function setRespuesta($newRespuesta){$this->respuesta=$newRespuesta;}
    }

?>