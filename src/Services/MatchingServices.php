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
        //
        $domainesCandidat =[];
        $domainesEntreprise = [];
        //récupération des domaines d'une entreprise dans un tableau
        array_push($domainesEntreprise,$entreprise->getDomaines());
        $skillsCandidat = $candidat->getCompetences();
        //récupération des domaines des compétences d'un candidat
        foreach ($skillsCandidat as $competence){
            array_push($domainesCandidat,$competence->getDomaine());
        }
        //variable pour compter le nombre de passage dans la boucle
        $boucle=0;
        //indice incrémenté si domaine d'une compétence de candidat est en commun avec un domaine d'une entreprise
        foreach ($domainesCandidat as $domaineCandidat){
            if (in_array($domaineCandidat,$domainesEntreprise)){
                $indice++;
            }
            $boucle++;
        }
        //retourne un pourcentage
        return round(($indice*100)/(6+$boucle));

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
        //si domaine concordant
        //retourne le pourcentage
        return round(($indice*100)/6);
    }
}