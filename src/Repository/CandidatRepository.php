<?php

namespace App\Repository;

use App\Entity\Candidat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidat[]    findAll()
 * @method Candidat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidat::class);
    }

    /**
     * récupère que les candidats actifs
     * @return int|mixed|string
     */
    public function findAllCandidatsActifs(){
        //dans la table Entreprise
        $qb=$this->createQueryBuilder('c')
            ->join('c.user','u')
            ->andwhere('u.etat = :etat')
            ->setParameter('etat',true);
        return $qb->getQuery()->getResult();
    }

}
