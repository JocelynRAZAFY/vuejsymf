<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 07/06/19
 * Time: 18:22
 */

namespace App\Manager;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\FamilleRepository;
use App\Services\ToolsService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleManager extends BaseManager
{

    private $articleRepository;

    private $familleRepository;

    private $toolsService;

    public function __construct(
        EntityManagerInterface $em,
        ContainerInterface $container,
        RequestStack $requestStack,
        SessionInterface $session,
        LoggerInterface $logger,
        SerializerInterface $serializer,
        ArticleRepository $articleRepository,
        FamilleRepository $familleRepository,
        ToolsService $toolsService)
    {
        $this->articleRepository = $articleRepository;
        $this->familleRepository = $familleRepository;
        $this->toolsService = $toolsService;

        parent::__construct($em, $container, $requestStack, $session, $logger, $serializer);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function updateArticle()
    {
        $article = $this->articleRepository->find($this->data->id);
        $famille = $this->familleRepository->find($this->data->idFamille);
        $oldPhoto = null;

        if(!$article){
            $action = 'add';
            $article = new Article();
            $article->setCode(ToolsService::generateUUIDV4());
        }else{
            $action = 'edit';
            $oldPhoto = $article->getPhoto();
        }

        // image venant du crop
        if($this->data->photo){
            if($oldPhoto){
                $this->toolsService->removeImage($oldPhoto);
            }
            $photo = $this->toolsService->uploadBase64($this->data->photo);
            $article->setPhoto($photo);
        }

        $article->setLabel($this->data->label);
        $article->setDescription($this->data->description);
        $article->setPrice($this->data->price);
        $article->setFamille($famille);
        $this->save($article);

        $res = [
            'action' => $action,
            'article' => $this->articleRepository->transform($article)
        ];
        return $this->success($res);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function allArticlePagination()
    {
        if($this->data->firstResult - 1 == 0){
            $firstResult = 0;
        }else{
            $firstResult = ($this->data->firstResult - 1) * $this->data->perPage;
        }

        if(isset($this->data->search) && $this->data->search != ''){
            $search = $this->data->search;
            $totalRows = $this->articleRepository->countArticleBySearch($search);
        }else{
            $search = null;
            $totalRows = count($this->articleRepository->findAll());
        }

        $articles = $this->articlePagination($firstResult,$this->data->perPage,$search);
        $articles = $this->toolsService->getDataFormat($articles);

        return $this->success($articles);
    }

    /**
     * @param $firstResult
     * @param $perPage
     * @param $search
     * @return array
     */
    private function articlePagination($firstResult,$perPage,$search)
    {
        $articles = $this->articleRepository->getArticlePagination($firstResult,$perPage,$search);
        return $this->articleRepository->transformAll($articles);
    }
}