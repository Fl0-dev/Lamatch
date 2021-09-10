<?php

namespace App\Services;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class Suppression
{
    private $userRepository;
    private $entityManager;

    public function __construct(UserRepository $userRepository,
                                EntityManagerInterface $entityManager){

        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }


public function suppression(){
        //récupération de tous les users
        $listUsers = $this->userRepository->findBy(['etat'=>false]);
        // date d'aujourd'hui
        $today = new \DateTime();
        //pour chaque utilisateur
        foreach ($listUsers as $user){
            //on récupère et clone la date de modification
            $date =$user->getDateModiff();
            $dateModif = clone $date;
            //on y ajoute 1 mois pour connaître la date de suppression
            $datePourSuppression = $dateModif->add(new \DateInterval('P1M'));
            //si la date de suppression est dépassée, on supprime l'utilisateur
            if ($datePourSuppression < $today){
                $this->entityManager->remove($user);
                $this->entityManager->flush();
            }
        }



}

}