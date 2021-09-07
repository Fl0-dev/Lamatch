<?php

namespace App\Services;

use App\Entity\Matching;
use App\Repository\EntrepriseRepository;
use App\Repository\MatchingRepository;
use Doctrine\ORM\EntityManagerInterface;

class MatchingServices
{
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;

    }


    public function matchingCandidat($candidat)
    {
        //hydratation d'un matching pour candidat
        $matching = new Matching();
        $matching->setValeurPrincipale($candidat->getValeurPrincipale());
        $matching->setRegion($candidat->getVille()->getRegion());
        $matching->setVille($candidat->getVille());
        $matching->setTypeContrat($candidat->getTypeContratSouhaite());
        $matching->setEnrecherche($candidat->getEnRecherche());
        $candidat->setMatchingC($matching);
        $this->entityManager->flush();
    }

    public function matchingEntreprise($entreprise)
    {
        //hydratation d'un matching pour entreprise
        $matching = new Matching();
        $matching->setValeurPrincipale($entreprise->getValeurPrincipale());
        $matching->setRegion($entreprise->getVille()->getRegion());
        $matching->setVille($entreprise->getVille());
        $matching->setTypeContrat($entreprise->getTypeContratPropose());
        $matching->setEnrecherche($entreprise->getEnRecherche());
        $entreprise->setMatchingE($matching);
        $this->entityManager->flush();
    }
}