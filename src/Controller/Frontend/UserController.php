<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\UserUpdateProfilType;

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

    /**
     * @Route("/profil/update/{id<\d+>}", name="profil_update")
     * 
     */
    public function profilupdate(Request $request, User $user, UserPasswordEncoderInterface $passwordEncoder, ObjectManager $manager) {

        // On stocke le mot de passe courant
        $currentPassword = $user->getPassword();

        $form = $this->createForm(UserUpdateProfilType::class, $user);
        // Ici, le nouveau mot de passe sera renseigné dans $user
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Si le mot de passe n'est pas modifié, on conserve l'ancien
            if (empty($user->getPassword())) {
                $user->setPassword($currentPassword);
            // Sinon, on encode le nouveau mot de passe
            } else {
                // Mot de passe qui vient du formulaire
                $password = $user->getPassword();
                // On l'encode via le passwordEncoder reçu depuis la méthode du contrôleur
                $encodedPassword = $passwordEncoder->encodePassword($user, $password);
                // On écrase le mot de passe avec le mot de passe encodé
                $user->setPassword($encodedPassword);
            }
              
            $manager->flush();

            $this->addFlash(
                    'success',
                    'Votre modification de profil a bien été enregistrée - Veuillez vous reconnecter'
                );

            return $this->redirectToRoute('app_login');
        }

        return $this->render('frontend/user/profil_update.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
}
