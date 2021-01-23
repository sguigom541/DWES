<?php
// src/Controller/hola.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Hola extends AbstractController
{
    /**
     * @Route("/")
     *
     */
    public function homepage(): Response
    {
        return new Response(
            '<html><body>Usted está en la página principal</body></html>'
        );
    }


    /**
     * @Route("/hola/{nombre}")
     *
     * @return Response
     */
    public function saluda($nombre): Response
    {

        /*return new Response(
            '<html><body>Hola ' . $nombre . '</body></html>'
        );*/
        return $this->render("saludo.html.twig",array("nombre"=>$nombre));
    }
    public function adios(): Response
    {
        return new Response(
            '<html><body>Adios mundo</body></html>'
        );
    }
    public function saludaconparametros($nombre): Response
    {
        return new Response(
            '<html><body>Hola ' . $nombre . '</body></html>'
        );
    }
}
