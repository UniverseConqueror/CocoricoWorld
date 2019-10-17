<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/frontend/main", name="frontend_main")
     */
    public function index()
    {
        return $this->render('frontend/main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
