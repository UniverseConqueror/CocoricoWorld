<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SubCategoryController extends AbstractController
{
    /**
     * @Route("/backend/sub/category", name="backend_sub_category")
     */
    public function index()
    {
        return $this->render('backend/sub_category/index.html.twig', [
            'controller_name' => 'SubCategoryController',
        ]);
    }
}
