<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProducerController extends AbstractController
{
    /**
     * @Route("/frontend/producer", name="frontend_producer")
     */
    public function index()
    {
        return $this->render('frontend/producer/index.html.twig', [
            'controller_name' => 'ProducerController',
        ]);
    }
}
