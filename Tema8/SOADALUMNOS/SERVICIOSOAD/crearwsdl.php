<?php
require_once './vendor/autoload.php';
include './servicioalumno.php';
$class = 'servicioalumno';
$serviceURI = 'http://localhost/2DAW/SOADALUMNOS/SERVICIOSOAD/';
$wsdlGenerator = new php2
// Generate the WSDL from the class adding only the public methods that have @soap annotation.
$wsdlGenerator->generateWSDL(true);
// Dump as string
$wsdlXML = $wsdlGenerator->dump();
// Or save as file
$wsdlXML = $wsdlGenerator->save('saludo.wsdl');
