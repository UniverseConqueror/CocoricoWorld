<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package App\Controller\Backend
 * @Route("/backend", name="backend_")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_list")
     */
    public function index()
    {
        return $this->render('backend/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    
}

