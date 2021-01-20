<?php
    $cliente=new SoapClient('http://localhost/2DAW/SOADALUMNOS/SERVICIOSOAD/',array(
        'location' => 'http://localhost/2DAW/SOADALUMNOS/SERVICIOSOAD/servidor_soap.php',
        'uri'      => "http://localhost/2DAW/SOADALUMNOS/SERVICIOSOAD/",
        'trace'    => 1
       ));
   
     try {
        echo $return = $client->__soapCall("nombre", ["a"=> 5,"b"=> 4 ] );
    } catch ( SOAPFault $e ) {
        echo $e->getMessage().PHP_EOL;
    }


