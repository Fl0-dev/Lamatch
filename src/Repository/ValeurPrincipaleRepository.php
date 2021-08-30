<?php

namespace App\Repository;

use App\Entity\ValeurPrincipale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ValeurPrincipale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValeurPrincipale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValeurPrincipale[]    findAll()
 * @method ValeurPrincipale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurPrincipaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValeurPrincipale::class);
    }

    // /**
    //  * @return ValeurPrincipale[] Returns an array of ValeurPrincipale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ValeurPrincipale
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
