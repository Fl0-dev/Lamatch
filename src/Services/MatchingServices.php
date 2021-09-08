<?php

namespace App\Services;

use App\Entity\Matching;
use App\Repository\EntrepriseRepository;
use App\Repository\MatchingRepository;
use Doctrine\ORM\EntityManagerInterface;

class MatchingServices
{

    public function MatchingCandidatEntreprise($candidat,$entreprise){

        //variable qui s'incrémente à chaque matching
        $indice= 0;
        //si valeur en commun
        if ($entreprise->getValeurPrincipale()==$candidat->getValeurPrincipale()){
            $indice++;
        }
        //si ville en commun
        if ($entreprise->getVille()==$candidat->getVille()){
            $indice =$indice +2;
        }
        //si région en commun
        if ($entreprise->getVille()->getRegion()==$candidat->getVille()->getRegion()){
            $indice++;
        }
        // si type de contrat est le même
        if (($entreprise->getTypeContratPropose()==$candidat->getTypeContratSouhaite())){
            $indice++;
        }
        // si les deux parties sont en recherche
        if ($entreprise->getEnrecherche()==$candidat->getEnrecherche()){
                $indice++;
        }
        //si domaine concordant
        $domainesEntreprise = $entreprise->getDomaines();
        $skillsCandidat = $candidat->getCompetences();
        foreach ($skillsCandidat as $skills){
            $domainesCandidat = $skills->getDomaine();
            //TODO:
        }
        //retourne le pourcentage
        return round(($indice*100)/6);

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
        return round(($indice*100)/6);
    }
}