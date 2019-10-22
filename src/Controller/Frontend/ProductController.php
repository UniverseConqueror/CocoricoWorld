<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id<\d+>}", name="product_show", methods={"GET"})
     */
    public function show(Product $product)
    {
        return $this->render('frontend/product/show.html.twig', [
            'product' => $product
        ]);
    }
}
