<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/backend/mail", name="mail")
     */
    public function mail(\Swift_Mailer $mailer)
{
    $message = (new \Swift_Message('Hello Email'))
        ->setFrom('seb.marcaire@gmail.com')
        ->setTo('seb.marcaire@gmail.com')
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'backend/mail/index.html.twig'
               
            ),
            'text/html'
        )

        // you can remove the following code if you don't define a text version for your emails
        // ->addPart(
        //     $this->renderView(
        //         // templates/emails/registration.txt.twig
        //         'backend/mail/index.html.twig'
               
        //     ),
        //     'text/plain'
        // )
    ;

    $mailer->send($message);

    $this->addFlash(
        'email sent',
        'Votre email a bien été envoyé!'
    );

    return $this->redirectToRoute('homepage');
}
}
