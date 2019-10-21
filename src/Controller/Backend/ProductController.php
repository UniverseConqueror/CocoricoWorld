<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/backend/product", name="backend_product")
     */
    public function index()
    {
        return $this->render('backend/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    
}

