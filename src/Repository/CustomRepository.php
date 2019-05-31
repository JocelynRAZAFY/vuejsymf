<?php

namespace App\Repository;

use App\Entity\Custom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Custom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Custom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Custom[]    findAll()
 * @method Custom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomRepository extends ServiceEntityRepository
{
    private $userRepository;

    public function __construct(
        RegistryInterface $registry, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

        parent::__construct($registry, Custom::class);
    }

    public function transform(Custom $custom)
    {
        return [
            'id' => $custom->getId(),
            'title' => $custom->getTitle(),
            'content' => $custom->getContent(),
            'created' => $custom->getCreated(),
            'user' => $this->userRepository->transform($custom->getUser()),
        ];
    }

    public function transformAll($customs)
    {
        $arrayCustom = [];
        foreach ($customs as $custom){
            $arrayCustom[] = $this->transform($custom);
        }

        return $arrayCustom;
    }

    // /**
    //  * @return Custom[] Returns an array of Custom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Custom
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
