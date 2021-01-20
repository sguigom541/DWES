<?php
require_once './servicioalumno.php';
$server =new SoapServer('saludo.wsdl');
$server->setClass('servicioalumno');
$server->handle();




