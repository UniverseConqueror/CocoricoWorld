<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SubCategoryController
 * @package App\Controller\Backend
 * @Route("/backend", name="backend_")
 */
class SubCategoryController extends AbstractController
{
    /**
     * @Route("/subcategory", name="subcategory_list")
     */
    public function index()
    {
        return $this->render('backend/sub_category/index.html.twig', [
            'controller_name' => 'SubCategoryController',
        ]);
    }
}
