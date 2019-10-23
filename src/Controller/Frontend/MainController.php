<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProducerRepository;
use App\Form\ContactFormType;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, ProducerRepository $producerRepository)
    {
        $producers = $producerRepository->findAll();

        return $this->render('frontend/main/index.html.twig', [
            'producers' => $producers,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */

     public function contact(Request $request)
     {
        $contact = '';

        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        //Traitement du form
        if ($form->isSubmitted() && $form->isValid()) {
           

            $this->addFlash(
                'email sent',
                'Votre email a bien été envoyé !'
            );

            return $this->redirectToRoute('homepage');
        }

        return $this->render('frontend/main/contact.html.twig', [
            'form' => $form->createView()
            ]);
     }
}
