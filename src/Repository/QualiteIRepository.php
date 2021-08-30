<?php

namespace App\Repository;

use App\Entity\QualiteI;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QualiteI|null find($id, $lockMode = null, $lockVersion = null)
 * @method QualiteI|null findOneBy(array $criteria, array $orderBy = null)
 * @method QualiteI[]    findAll()
 * @method QualiteI[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualiteIRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QualiteI::class);
    }

    // /**
    //  * @return QualiteI[] Returns an array of QualiteI objects
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
    public function findOneBySomeField($value): ?QualiteI
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
