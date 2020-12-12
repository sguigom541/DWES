<?php
    class Funcion{
        /**
         * @param $passMD5 la contraseña del usuario
         * @return String la contraseña encriptada en md5
         */
        public static function encrypt($passMD5)
        {
            $passEncriptada=md5($passMD5);
            return $passEncriptada;
        }
    }

?>