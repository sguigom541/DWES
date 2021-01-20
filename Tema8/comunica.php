<?php

    class comunica
    {
        /**
         * @param string $persona
         * @return string $saludo
         */
        public function saluda($persona)
        {
            $saludo="Hola $persona";
            return $saludo;
        }

        /**
         * @param string $persona
         * @return string $despedida
         */
        public function despidete($persona)
        {
            $despedida="Adiós $persona";
            return $despedida;
        }
    }