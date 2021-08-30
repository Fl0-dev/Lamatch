<?php

namespace App\Repository;

use App\Entity\QualiteC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QualiteC|null find($id, $lockMode = null, $lockVersion = null)
 * @method QualiteC|null findOneBy(array $criteria, array $orderBy = null)
 * @method QualiteC[]    findAll()
 * @method QualiteC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualiteCRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QualiteC::class);
    }

    // /**
    //  * @return QualiteC[] Returns an array of QualiteC objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QualiteC
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
