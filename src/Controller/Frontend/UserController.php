<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/profil/{id<\d+>}", name="profil_user")
     */
    public function profil($id, User $user, UserRepository $userrepository)
    {
        $user = $userrepository->find($id);

        return $this->render('frontend/user/profil.html.twig', [
            'user' => $user
        ]);
    }
}
