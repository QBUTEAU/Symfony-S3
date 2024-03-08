<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(
        ArticleRepository $articlerepository
    ): Response
    {
        $article = $articlerepository->findBy([], ['datePublication' => 'DESC'], 3);
        return $this->render('articles/index.html.twig', [
            'articles' => $article,
        ]);
    }
}
