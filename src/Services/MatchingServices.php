<?php

namespace App\Services;

use App\Entity\Matching;
use App\Repository\EntrepriseRepository;
use App\Repository\MatchingRepository;
use Doctrine\ORM\EntityManagerInterface;

class MatchingServices
{

    public function Matching($candidat,$entreprise): float
    {

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
        //si expérience du candidat et l'expérience demandée sont concordantes
        //TODO
        //si meilleur niveau de formation du candidat et niveau demandé sont concordants
        //TODO
        //récupération de tous les niveaux de formation du candidat
        /*$formations = [];
        array_push($formations,$candidat->getFormations());
        $niveauxFormation=[];

        foreach ($formations as $formation) {
            array_push($niveauxFormation, $formation->getNiveau());
        }*/
        //si domaines des 2 parties sont concordants
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
}