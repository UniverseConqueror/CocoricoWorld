<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @package App\Controller\Backend
 * @Route("/backend", name="backend_")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category_list")
     */
    public function index()
    {
        return $this->render('backend/category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
