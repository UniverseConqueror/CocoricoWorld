<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Producer;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\ProducerRepository;

class ProducerController extends AbstractController
{
    /**
     * @Route("/producer/{id<\d+>}", name="producer_show", methods={"GET"})
     */
    public function show(Producer $producer, ObjectManager $manager)
    {
        if (!$producer) {
            throw $this->createNotFoundException('Producteur introuvable');
        }
        return $this->render('frontend/producer/show.html.twig', [
            'producer' => $producer,
        ]);
    }
}
