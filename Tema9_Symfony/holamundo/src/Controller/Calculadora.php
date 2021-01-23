<?php

    // src/Controller/hola.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Calculadora extends AbstractController
{
    


    /**
     * @Route("/suma/{num1}/{num2}",name="suma")
     *
     * @return Response
     */
    public function suma($num1,$num2): Response
    {
        $suma=$num1+$num2;
        return new Response(
            '<html><body>La suma de los dos números es ' . $suma . '</body></html>'
        );
    }
    
    /**
     *@Route("/resta/{num1}/{num2}",requirements={
         "num1"="\d+",
         "num2"="\d+"
     },name="resta")
     * @return Response
     */
    public function resta($num1,$num2): Response
    {
        $resta=$num1-$num2;
        return new Response(
            '<html><body>La resta de los dos números es ' . $resta . '</body></html>'
        );
    }
    /**
     * @Route("/multiplica/{num1}/{num2}",requirements={
     *  "num1"="\d+",
     *  "num2"="\d+"
     * },name="multiplica")
     * @return Response
     */
    public function multiplica($num1,$num2): Response
    {
        $multiplica=$num1*$num2;
        return new Response(
            '<html><body>El resultado de la multiplicación es: ' . $multiplica . '</body></html>'
        );
    }

    /**
     * @Route("/divide/{num1}/{num2}",name="divide")
     *
     * 
     * @return Response
     */
    public function divide($num1,$num2): Response
    {
        $division=$num1/$num2;
        return new Response(
            '<html><body> El resultado de dividir '.$num1.' entre '.$num2.' es:'.$division
        );
    }

    /**
     * @Route("/cuadrado/{num}",name="cuadrado")
     *
     * 
     * @return Response
     */
    public function cuadrado($num): Response
    {
        return $this->redirectToRoute("multiplica",array("num1"=>$num,"num2"=>$num));
    }
    /**
     * @Route("/positivo/{num}")
     *
     */
    public function espositivo($num): Response
    {
        return $this->render("numero.html.twig",array("numero"=>$num));

    }
    
}

