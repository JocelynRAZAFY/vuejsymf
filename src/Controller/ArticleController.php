<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $articleManager;

    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * @Route("/api/back/article/update", name="update_article")
     */
    public function updateArticle()
    {
        return $this->articleManager->updateArticle();
    }

    /**
     * @Route("/api/back/article/search", name="search_article", methods={"POST"})
     */
    public function searchArticle()
    {
        return $this->articleManager->allArticlePagination();
    }
}
