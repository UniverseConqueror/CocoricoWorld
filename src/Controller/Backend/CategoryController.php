<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/backend/category", name="backend_category")
     */
    public function index()
    {
        return $this->render('backend/category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
