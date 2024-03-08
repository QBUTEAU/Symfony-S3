<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class CategorieController extends AbstractController
{
    #[Route('/categorie/{categorie}', name: 'app_categorie')]
    public function index(Product $categorie): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}