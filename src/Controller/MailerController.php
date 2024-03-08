<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    // #[Route('/mail', name: 'app_mailer')]
    // public function index(
    //     MailerInterface $mailer,
    // ): Response
    // {
    //     $email = (new Email())
    //         ->from('hello@qbuteau.fr')
    //         ->to('you@example.com')
    //         //->cc('cc@example.com')
    //         //->addCc('deuxiemecc@example.com')
    //         //->addTo('deuxiemeto@example.com')
    //         //->bcc('bcc@example.com')
    //         //->replyTo('fabien@example.com')
    //         //->priority(Email::PRIORITY_HIGH)
    //         ->subject('Time for Symfony Mailer!')
    //         ->text('Sending emails is fun again!')
    //         ->html('<p>See Twig integration for better HTML integration!</p>');

    //     $mailer->send($email);
    // }

    #[Route('/mail2')]
    public function sendEmail2(MailerInterface $mailer): Response
    {
      $email = (new TemplatedEmail())
              ->from('fabien@example.com')
              ->to(new Address('ryan@example.com'))
              ->subject('Thanks for signing up!')
          
              // path of the Twig template to render
              ->htmlTemplate('mailer/signup.html.twig')
          
              // pass variables (name => value) to the template
              ->context([
                  'expiration_date' => new \DateTime('+7 days'),
                  'username' => 'foo',
              ])
          ;

        // ...
        $mailer->send($email);
    }
}
