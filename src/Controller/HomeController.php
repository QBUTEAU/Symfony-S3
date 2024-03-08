<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ArticleRepository $articlerepository,
        ProductRepository $categorierepository
    ):Response
    {
        $article = $articlerepository->findOneBy([], ['datePublication' => 'DESC']);
        $categorie = $categorierepository->findBy([], ['ordre' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'article' => $article,
            'categories' => $categorie,
        ]);
    }
}
