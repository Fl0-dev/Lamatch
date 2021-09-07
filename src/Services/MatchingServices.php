<?php

namespace App\Services;

use App\Entity\Matching;
use App\Repository\EntrepriseRepository;
use App\Repository\MatchingRepository;
use Doctrine\ORM\EntityManagerInterface;

class MatchingServices
{
    private $entityManager;
    private $entrepriseRepository;

    public function __construct(EntityManagerInterface $entityManager,EntrepriseRepository $entrepriseRepository){
        $this->entityManager = $entityManager;
        $this->entrepriseRepository =$entrepriseRepository;

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

    public function MatchingCandidatEntreprise($candidat){
        //récupération de tous les matching des entreprises


    }
}