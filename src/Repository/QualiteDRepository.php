<?php

namespace App\Repository;

use App\Entity\QualiteD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QualiteD|null find($id, $lockMode = null, $lockVersion = null)
 * @method QualiteD|null findOneBy(array $criteria, array $orderBy = null)
 * @method QualiteD[]    findAll()
 * @method QualiteD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualiteDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QualiteD::class);
    }

    // /**
    //  * @return QualiteD[] Returns an array of QualiteD objects
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
    public function findOneBySomeField($value): ?QualiteD
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
