<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/frontend/user", name="frontend_user")
     */
    public function index()
    {
        return $this->render('frontend/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
