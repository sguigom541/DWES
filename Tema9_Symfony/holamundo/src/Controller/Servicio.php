<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Servicio extends AbstractController
    {
        /**
         * @Route("/testRequest",name="testRequest")
         *
         */
        public function testRequest(Request $request)
        {
            $ip=$request->getClientIp();
            return new Response('<html><body>IP: '.$ip.'</body></html>');
        }

        /**
         * @Route("/sesion1",name="sesion1")
         *
         * @param SessionInterface $session
         * @return Response
         */
        public function sesion1(SessionInterface $session) : Response
        {
            $session->set("variable",100);
            return $this->redirectToRoute('sesion2');
        }
        
        /**
         * @Route("/sesion2",name="sesion2")
         *
         * @param SessionInterface $session
         * @return Response
         */
        public function sesion2(SessionInterface $session): Response
        {
            $var=$session->get("variable");
            return new Response('<html><body>Variable: '.$var.'</body></html>');
        }
    }