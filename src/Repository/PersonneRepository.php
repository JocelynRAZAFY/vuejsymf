<?php

namespace App\Repository;

use App\Entity\Personne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Personne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personne[]    findAll()
 * @method Personne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Personne::class);
    }

    public function transform(Personne $personne)
    {
        return [
            'id' => $personne->getId(),
            'lastName' => $personne->getLastName(),
            'firstName' => $personne->getFirstName(),
            'birthday' => $personne->getBirthday()->format('d/m/Y'),
            'registrationNumber' => $personne->getRegistrationNumber(),
            'adress' => $personne->getAdress(),
            'tel' => $personne->getTel(),
        ];
    }

    public function transformAll($personnes)
    {
        $arrayPersone = [];
        foreach ($personnes as $personne){
            $arrayPersone[] = $this->transform($personne);
        }

        return $arrayPersone;
    }

    // /**
    //  * @return Personne[] Returns an array of Personne objects
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
    public function findOneBySomeField($value): ?Personne
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
