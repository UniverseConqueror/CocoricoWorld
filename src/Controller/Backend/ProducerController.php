<?php

namespace App\Controller\Backend;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ProducerController
 * @package App\Controller\Backend
 * @Route("/backend", name="backend_")
 */
class ProducerController extends AbstractController
{
    /**
     * @Route("/producer", name="producer_list", )
     */
    public function index()
    {
        return $this->render('backend/producer/index.html.twig', [
            'controller_name' => 'ProducerController',
        ]);
    }
    
}
