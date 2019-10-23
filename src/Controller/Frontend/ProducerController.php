<?php

namespace App\Controller\Frontend;

use App\Entity\Producer;
use App\Form\ProducerType;
use App\Repository\ProducerRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProducerController extends AbstractController
{
    /**
     * @Route("/producer/registration", name="producer_registration", methods={"GET","POST"})
     */
    public function new(Request $request, UserInterface $user): Response
    {
        $producer = new Producer();
        $form = $this->createForm(ProducerType::class, $producer);
        $form->handleRequest($request);

        

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $producer->setUser($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($producer);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Enregistrement effectué'
            );

            return $this->redirectToRoute('homepage');
        }

        return $this->render('frontend/producer/registration.html.twig', [
            'producer' => $producer,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/producer/{id<\d+>}", name="producer_show", methods={"GET"})
     */
    public function show($id, ProducerRepository $producerRepository)
    {
        $producer = $producerRepository->find($id);

        if (!$producer) {
            throw $this->createNotFoundException('Producteur introuvable');
        }
        return $this->render('frontend/producer/show.html.twig', [
            'producer' => $producer,
        ]);
    }
}
