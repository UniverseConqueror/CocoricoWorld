<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProducerRepository;
use App\Form\ContactFormType;

class MainController extends AbstractController
{
    /**
     * @Route("/",
     *     name="homepage",
     *     methods={"GET"})
     *
     * @param Request $request
     * @param ProducerRepository $producerRepository
     *
     * @return Response
     */
    public function index(Request $request, ProducerRepository $producerRepository)
    {
        $producers = $producerRepository->findAll();

        return $this->render('frontend/main/index.html.twig', [
            'producers' => $producers,
        ]);
    }

    /**
     * @Route("/company",
     *     name="company_page",
     *     methods={"GET"})
     */
    public function showCompanyPresentation()
    {
        return $this->render("frontend/main/company.html.twig");
    }

    /**
     * @Route("/faq",
     *     name="faq_page",
     *     methods={"GET"})
     */
    public function showFaq()
    {
        return $this->render("frontend/main/faq.html.twig");
    }
  
    /**
     * @Route("/cgv",
     *     name="cgv_page",
     *     methods={"GET"})
     */
    public function showCgv()
    {
        return $this->render("frontend/main/cgv.html.twig");
    }

    /**
     * @Route("/mentions-legales",
     *     name="legalsmentions_page",
     *     methods={"GET"})
     */
    public function showLegalsMentions()
    {
        return $this->render("frontend/main/legalsmentions.html.twig");
    }

    /**
     * @Route("/contact",
     *     name="contact",
     *     methods={"GET", "POST"})
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function contact(Request $request)
    {
        $contactForm = $this->createForm(ContactFormType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {

            $this->addFlash(
                'success',
                'L\'email a été envoyé avec succès !'
            );

            return $this->redirectToRoute('homepage');
        }

        return $this->render('frontend/main/contact.html.twig', [
                'contact_form' => $contactForm->createView(),
            ]);
    }
}
