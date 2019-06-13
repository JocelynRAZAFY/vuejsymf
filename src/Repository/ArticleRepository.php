<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @param Article $article
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id' => $article->getId(),
            'code' => $article->getCode(),
            'label' => $article->getLabel(),
            'description' => $article->getDescription(),
            'price' => $article->getPrice(),
            'famille' => [
                'id' => $article->getFamille()->getId(),
                'label' => $article->getFamille()->getLabel()
            ],
        ];
    }

    /**
     * @param $articles
     * @return array
     */
    public function transformAll($articles)
    {
        $arrayArticle = [];
        foreach ($articles as $article){
            $arrayArticle[] = $this->transform($article);
        }

        return $arrayArticle;
    }

    public function getArticlePagination($firstResult,$perPage,$search)
    {
        $qb = $this->createQueryBuilder('a');
        if($search){
            $qb->andWhere('a.label LIKE :search')
                ->setParameter('search', '%'.$search.'%');
        }
        $qb->orderBy('a.label', 'ASC')
            ->setFirstResult($firstResult)
            ->setMaxResults($perPage);

        return $qb->getQuery()->getResult();
    }

    public function countArticleBySearch($search)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->andWhere('a.label LIKE :search')
            ->setParameter('search', '%'.$search.'%');

        return count($qb->getQuery()->getResult());
    }
    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
