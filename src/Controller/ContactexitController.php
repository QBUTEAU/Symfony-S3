<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactexitController extends AbstractController
{
    #[Route('/contactexit', name: 'app_contactexit')]
    public function index(): Response
    {
        return $this->render('contactexit/index.html.twig', [
            'controller_name' => 'ContactexitController',
        ]);
    }
}
