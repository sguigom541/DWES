<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(): Response
    {
        $entityManager=$this->getDoctrine()->getManager();

        $product=new Product();
        $product->setName('keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
    
    /**
     * @Route("/product/{id}", name="product_show")
     */
    /*
    public function show(int $id,ProductRepository $productRepository): Response
    {
        $product = $productRepository
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$product->getName());
    }*/


    
    /**
     * @Route("/product/listado", name="product_listado")
     */
    public function listado(ProductRepository $productRepository): Response
    {
        $product = $productRepository
            ->findAll();


        return $this->render('product/show.html.twig',[
            'productos'=>$product,
        ]);
    }


}
