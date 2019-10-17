<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/frontend/product", name="frontend_product")
     */
    public function index()
    {
        return $this->render('frontend/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
