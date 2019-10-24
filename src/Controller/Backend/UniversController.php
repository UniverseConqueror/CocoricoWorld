<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UniversController
 * @package App\Controller\Backend
 * @Route("/backend", name="backend_")
 */
class UniversController extends AbstractController
{
    /**
     * @Route("/univers", name="univers_list")
     */
    public function index()
    {
        return $this->render('backend/univers/index.html.twig', [
            'controller_name' => 'UniversController',
        ]);
    }
}
