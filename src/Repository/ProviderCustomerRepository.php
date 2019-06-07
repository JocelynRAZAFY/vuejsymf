<?php

namespace App\Repository;

use App\Entity\ProviderCustomer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProviderCustomer|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProviderCustomer|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProviderCustomer[]    findAll()
 * @method ProviderCustomer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProviderCustomerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProviderCustomer::class);
    }

    // /**
    //  * @return ProviderCustomer[] Returns an array of ProviderCustomer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProviderCustomer
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
