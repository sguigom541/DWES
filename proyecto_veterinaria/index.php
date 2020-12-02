<?php
    require_once './loader/cargarclases.php';
    require_once './loader/cargarhelper.php';
    
    class Principal 
    {
        public static function main(){
            require_once './helper/session.php';
            require_once './view/principal/layout.php';
        }
    }
    Principal::main();

?>