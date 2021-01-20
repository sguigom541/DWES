<?php
// src/Controller/hola.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class Hola
{
    public function saluda(): Response
    {
        
        return new Response(
            '<html><body>Hola mundo</body></html>'
        );
    }
    public function adios(): Response
    {
        return new Response(
            '<html><body>Adios mundo</body></html>'
        );
    }
    
}
