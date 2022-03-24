<?php

namespace App\Repository;

use App\Entity\SplMoment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SplMoment|null find($id, $lockMode = null, $lockVersion = null)
 * @method SplMoment|null findOneBy(array $criteria, array $orderBy = null)
 * @method SplMoment[]    findAll()
 * @method SplMoment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SplMomentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SplMoment::class);
    }

    // /**
    //  * @return SplMoment[] Returns an array of SplMoment objects
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
    public function findOneBySomeField($value): ?SplMoment
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
