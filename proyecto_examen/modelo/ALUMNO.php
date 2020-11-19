<?php
    class alumno
    {
        private $dni;
        private $pass;
        private $nombre;
        private $ape1;
        private $ape2;
        private $fechaNac;
        private $foto;

        public function __construct($row)
        {
            $this->setDNI($row['dni']);
            $this->setPassword($row['pass']);
            $this->setNombre($row['nombre']);
            $this->setApe1($row['apellido1']);
            $this->setApe2($row['apellido2']);
            $this->setFechaNac($row['fechaNac']);
            $this->setFotoUsuario($row['fotoUsuario']);

        }
        public function getDNI(){return $this->dni;}

        public function setDNI($newDNI){$this->dni=$newDNI;}

        public function getPassword(){return $this->pass;}

        public function setPassword($newPassword){$this->pass=$newPassword;}

        public function getNombre(){return $this->nombre;}

        public function setNombre($newNombre){$this->nombre=$newNombre;}

        public function getApe1(){return $this->ape1;}

        public function setApe1($newApe1){$this->ape1=$newApe1;}

        public function getApe2(){return $this->ape2;}

        public function setApe2($newApe2){$this->ape2=$newApe2;}

        public function getFechaNac(){return $this->fechaNac;}

        public function setFechaNac($newFechaNac){$this->fechaNac=$newFechaNac;}

        public function getFotoUsuario(){return $this->foto;}
        
        public function setFotoUsuario($newFoto){$this->foto=$newFoto;}

        public function getNombreCompleto() {print "<p>" . $this->nombre.",".$this->ape1.",".$this->ape2 . "</p>";}
    }
?>