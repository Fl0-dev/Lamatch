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




    public function MatchingCandidatEntreprise($candidat,$entreprise){

        //variable qui s'incrémente à chaque matching
        $indice= 0;
        if ($entreprise->getValeurPrincipale()==$candidat->getValeurPrincipale()){
            $indice++;
        }
        if ($entreprise->getVille()==$candidat->getVille()){
            $indice =$indice +2;
        }
        if ($entreprise->getVille()->getRegion()==$candidat->getVille()->getRegion()){
            $indice++;
        }
        if (($entreprise->getTypeContratPropose()==$candidat->getTypeContratSouhaite())){
            $indice++;
        }
        if ($entreprise->getEnrecherche()==$candidat->getEnrecherche()){
                $indice++;
        }
        //retourne le pourcentage
        return ($indice*100)/6;

    }

    public function MatchingEntrepriseCandidat($entreprise, $candidat)
    {
        //variable qui s'incrémente à chaque matching
        $indice =0;
        if ($entreprise->getValeurPrincipale()==$candidat->getValeurPrincipale()){
            $indice++;
        }
        if ($entreprise->getVille()==$candidat->getVille()){
            $indice =$indice +2;
        }
        if ($entreprise->getVille()->getRegion()==$candidat->getVille()->getRegion()){
            $indice++;
        }
        if (($entreprise->getTypeContratPropose()==$candidat->getTypeContratSouhaite())){
            $indice++;
        }
        if ($entreprise->getEnrecherche()==$candidat->getEnrecherche()){
            $indice++;
        }
        //retourne le pourcentage
        return ($indice*100)/6;
    }
}