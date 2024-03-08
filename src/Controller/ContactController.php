<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig');
    }

    #[Route('/contact/send', name: 'contact_send', methods: ['POST'])]
    public function send(Request $request, MailerInterface $mailer): Response
    {
        $destinataire = $request->request->get('sender');
        $sujet = $request->request->get('subject');
        $message = $request->request->get('message');

        // Replace 'your_email@example.com' with your email

        $email = (new Email())
            ->from("contact@qbuteau.fr")
            ->to("contact@blog.fr")
            ->replyTo($destinataire)
            ->cc($destinataire)
            ->subject($sujet)
            ->htmlTemplate('mailer/index.html.twig')
            ->textTemplate('mailer/mail.txt.twig')
            ->context([
                'destinataire' => $destinataire,
                'message' => $message,
            ]);

        $mailer->send($email);

        return $this->redirectToRoute('app_contact');
    }
}

?>
