<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProducerRepository;

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
     * @Route("/company", name="company_page")
     */
    public function showCompanyPresentation()
    {
        return $this->render("frontend/main/company.html.twig");
    }

    /**
     * @Route("/faq", name="faq_page")
     */
    public function showFaq()
    {
        return $this->render("frontend/main/faq.html.twig");
    }
  
    /**
     * @Route("/cgv", name="cgv_page")
     */
    public function showCgv()
    {
        return $this->render("frontend/main/cgv.html.twig");
    }

    /**
     * @Route("/legalsmentions", name="legalsmentions_page")
     */
    public function showLegalsMentions()
    {
        return $this->render("frontend/main/legalsmentions.html.twig");
    }
}
