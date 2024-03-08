<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieTestController extends AbstractController
{
    #[Route('/categorie/test', name: 'app_categorie_test')]
    public function index(): Response
    {
        return $this->render('categorie_test/index.html.twig', [
            'controller_name' => 'CategorieTestController',
        ]);
    }
}
