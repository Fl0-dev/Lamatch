<?php

namespace App\Repository;

use App\Entity\Entreprise;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entreprise[]    findAll()
 * @method Entreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entreprise::class);
    }

    /**
     * récupère que les entreprises actives
     * @return int|mixed|string
     */
    public function findAllEntrepriseActif(){
        //dans la table Entreprise
        $qb=$this->createQueryBuilder('e')
            ->join('e.user','u')
            ->andwhere('u.etat = :etat')
            ->setParameter('etat',true);
        return $qb->getQuery()->getResult();
    }

}
