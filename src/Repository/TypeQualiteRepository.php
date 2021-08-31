<?php

namespace App\Repository;

use App\Entity\TypeQualite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeQualite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeQualite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeQualite[]    findAll()
 * @method TypeQualite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeQualiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeQualite::class);
    }

    // /**
    //  * @return TypeQualite[] Returns an array of TypeQualite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeQualite
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
