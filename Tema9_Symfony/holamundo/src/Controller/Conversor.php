<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class Conversor
{
    /**
     * @Route("/convertoeuro/{target}/{format}/{importe}")
     *
     * @return void
     */
    public function conversor($target,$format,$importe):Response
    {
       //$fichero=new DOMDocument();
      // $fichero->load("https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");
       //$arrayMonedas=$fichero->getElementsByTagName("Cube");
       
       
        return new Response("");
    }
}
