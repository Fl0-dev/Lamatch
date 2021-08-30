<?php

namespace App\Repository;

use App\Entity\QualiteS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QualiteS|null find($id, $lockMode = null, $lockVersion = null)
 * @method QualiteS|null findOneBy(array $criteria, array $orderBy = null)
 * @method QualiteS[]    findAll()
 * @method QualiteS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualiteSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QualiteS::class);
    }

    // /**
    //  * @return QualiteS[] Returns an array of QualiteS objects
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
    public function findOneBySomeField($value): ?QualiteS
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
