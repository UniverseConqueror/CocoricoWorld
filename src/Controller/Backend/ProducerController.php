<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProducerController extends AbstractController
{
    /**
     * @Route("/backend/producer", name="backend_producer")
     */
    public function index()
    {
        return $this->render('backend/producer/index.html.twig', [
            'controller_name' => 'ProducerController',
        ]);
    }
}
