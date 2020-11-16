<?php
    class examen
    {
        
        private $codExamen;
        private $fechaHoraComienzo;
        private $fechaHoraFin;
        private $duracion;

        public function __construct($row)
        {
            $this->setCodExamen($row['codExamen']);
            $this->setFechaHoraComienzo($row['fechaHoraComienzo']);
            $this->setFechaHoraFin($row['fechaHoraFin']);
            $this->setDuracion($row['duracion']);
        }
        
        public function getCodExamen(){return $this->codExamen;}
        public function setCodExamen($newCodExamen){$this->codExamen=$newCodExamen;}
        public function getFechaHoraComienzo(){return $this->fechaHoraComienzo;}
        public function setFechaHoraComienzo($nuevaFechaHoraComienzo){$this->fechaHoraComienzo=$nuevaFechaHoraComienzo;}
        public function getFechaHoraFin(){return $this->fechaHoraFin;}
        public function setFechaHoraFin($nuevaFechaHoraFin){$this->fechaHoraFin=$nuevaFechaHoraFin;}
        public function getDuracion(){return $this->duracion;}
        public function setDuracion($nuevaDuracion){$this->fechaHoraFin=$nuevaDuracion;}

    }


?>