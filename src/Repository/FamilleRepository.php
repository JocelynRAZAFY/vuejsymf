<?php

namespace App\Repository;

use App\Entity\Famille;
use App\Services\ToolsService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Famille|null find($id, $lockMode = null, $lockVersion = null)
 * @method Famille|null findOneBy(array $criteria, array $orderBy = null)
 * @method Famille[]    findAll()
 * @method Famille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilleRepository extends ServiceEntityRepository
{
    private $toolsService;

    public function __construct(
        RegistryInterface $registry,
        ToolsService $toolsService)
    {
        $this->toolsService = $toolsService;
        parent::__construct($registry, Famille::class);
    }

    public function transform(Famille $famille)
    {
        return [
            'id' => $famille->getId(),
            'label' => $famille->getLabel(),
            'photo' => $this->toolsService->imageToBase64($famille->getPhoto()),
        ];
    }

    public function transformAll($familles)
    {
        $arrayFamille = [];
        foreach ($familles as $famille){
            $arrayFamille[] = $this->transform($famille);
        }

        return $arrayFamille;
    }

    /**
     * @param $firstResult
     * @param $perPage
     * @param null $search
     * @return mixed
     */
    public function getFamillePagination($firstResult,$perPage,$search)
    {
        $qb = $this->createQueryBuilder('f');
        if($search){
            $qb->andWhere('f.label LIKE :search')
                ->setParameter('search', '%'.$search.'%');
        }
        $qb->orderBy('f.label', 'ASC')
            ->setFirstResult($firstResult)
            ->setMaxResults($perPage);

        return $qb->getQuery()->getResult();
    }

    public function countFamilleBySearch($search)
    {
        $qb = $this->createQueryBuilder('f');
        $qb->andWhere('f.label LIKE :search')
            ->setParameter('search', '%'.$search.'%');

        return count($qb->getQuery()->getResult());
    }
    // /**
    //  * @return Famille[] Returns an array of Famille objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Famille
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
