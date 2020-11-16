<?php
    class pregunta{
        private $codPregunta;
        private $enunciado;
        private $respuesta1;
        private $respuesta2;
        private $respuesta3;
        private $respuesta4;
        private $respuestaCorrecta;

        public function __construct($row)
        {
            $this->setCodPregunta($row['codPregunta']);
            $this->setEnunciado($row['enunciado']);
            $this->setRespuesta1($row['respuesta1']);
            $this->setRespuesta2($row['respuesta2']);
            $this->setRespuesta3($row['respuesta3']);
            $this->setRespuesta4($row['respuesta4']);
            $this->setRespuestaCorrecta($row['respuestaCorrecta']);
        }

        public function getCodPregunta(){$this->codPregunta;}
        public function getEnunciado(){$this->enunciado;}
        public function getRespuesta1(){$this->respuesta1;}
        public function getRespuesta2(){$this->respuesta2;}
        public function getRespuesta3(){$this->respuesta3;}
        public function getRespuesta4(){$this->respuesta4;}
        public function getRespuestaCorrecta(){$this->respuestaCorrecta;}
        public function setCodPregunta($newCodPregunta){$this->codPregunta=$newCodPregunta;}
        public function setEnunciado($newEnunciado){$this->enunciado=$newEnunciado;}
        public function setRespuesta1($newRespuesta1){$this->respuesta1=$newRespuesta1;}
        public function setRespuesta2($newRespuesta2){$this->respuesta2=$newRespuesta2;}
        public function setRespuesta3($newRespuesta3){$this->respuesta3=$newRespuesta3;}
        public function setRespuesta4($newRespuesta4){$this->respuesta4=$newRespuesta4;}
        public function setRespuestaCorrecta($newRespuestaCorrecta){$this->respuestaCorrecta=$newRespuestaCorrecta;}


        
    }
    
?>