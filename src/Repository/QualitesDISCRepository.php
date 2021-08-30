<?php

namespace App\Repository;

use App\Entity\QualitesDISC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QualitesDISC|null find($id, $lockMode = null, $lockVersion = null)
 * @method QualitesDISC|null findOneBy(array $criteria, array $orderBy = null)
 * @method QualitesDISC[]    findAll()
 * @method QualitesDISC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualitesDISCRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QualitesDISC::class);
    }

    // /**
    //  * @return QualitesDISC[] Returns an array of QualitesDISC objects
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
    public function findOneBySomeField($value): ?QualitesDISC
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
