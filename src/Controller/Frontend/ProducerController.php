<?php

namespace App\Controller\Frontend;

use App\Entity\Producer;
use App\Form\ProducerType;
use App\Service\FileUploader;
use App\Repository\ProducerRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProducerController extends AbstractController
{
    /**
     * @Route("/producer/{id<\d+>}/profil", name="producer_profil")
     */
    public function index($id, ProducerRepository $producerRepository)
    {
        $producer = $producerRepository->find($id);

        return $this->render('frontend/producer/profil.html.twig', [
            'producer' => $producer,
        ]);
    }

    /**
     * @Route("/producer/registration", name="producer_registration", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $producer = new Producer();
        $form = $this->createForm(ProducerType::class, $producer);
        $form->handleRequest($request);

        

        if ($form->isSubmitted() && $form->isValid()) {
            // on récupère l'image du formaulaire
            $avatar = $form['avatar']->getData();
            if ($avatar) {
                // on récupère le nom de l'avatar saisi dans le formulaire
                $avatarName = $fileUploader->upload($avatar);
                 // on envoi le nom de l'avatar à la bdd
                $producer->setAvatar($avatarName);
            }
            
            $user = $producer->setUser($this->getUser());
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
    /**
     * @Route("/producer/{id<\d+>}/edit", name="producer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectManager $manager, Producer $producer ): Response
    {
        
        $form = $this->createForm(ProducerType::class, $producer);
        $form->handleRequest($request);

        

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Mise à jour effectuée'
            );

            return $this->redirectToRoute('producer_profil',['id'=>$producer->getId()]);
        }

        return $this->render('frontend/producer/edit.html.twig', [
            'producer' => $producer,
            'form' => $form->createView(),
        ]);
    }
}
