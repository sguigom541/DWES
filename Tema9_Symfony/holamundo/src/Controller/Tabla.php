<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class Tabla extends AbstractController
{
    /**
     * 
     *
     * @return void
     */
    public function tabla()
    {
        $filas = json_decode(file_get_contents("http://datos.santander.es/api/rest/datasets/lineas_bus.xml"),true);
        return $this->render("tabla.html.twig",$filas);
    }
}
