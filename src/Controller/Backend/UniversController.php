<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UniversController extends AbstractController
{
    /**
     * @Route("/backend/univers", name="backend_univers")
     */
    public function index()
    {
        return $this->render('backend/univers/index.html.twig', [
            'controller_name' => 'UniversController',
        ]);
    }
}
