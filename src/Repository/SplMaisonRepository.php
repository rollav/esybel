<?php

namespace App\Repository;

use App\Entity\SplMaison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SplMaison|null find($id, $lockMode = null, $lockVersion = null)
 * @method SplMaison|null findOneBy(array $criteria, array $orderBy = null)
 * @method SplMaison[]    findAll()
 * @method SplMaison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SplMaisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SplMaison::class);
    }

    // /**
    //  * @return SplMaison[] Returns an array of SplMaison objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SplMaison
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
