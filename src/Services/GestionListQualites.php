<?php

namespace App\Services;

use App\Entity\Candidat;
use App\Entity\Entreprise;
use App\Repository\TypeQualiteRepository;

class GestionListQualites
{

    public function TypeQualiteMaxCandidat(Candidat $candidat, Entreprise $entreprise){
        //récupération des qualités du candidat
        $qualites=$candidat->getListQualites();
        //récupération du type de qualité recherché par l'entreprise
        $typeRecherche= $entreprise->getTraitDeCaractereSouhaite();
        //indice de compatibilité
        $compatible=0;
        $nbQualite=0;
        foreach ($qualites as $qualite) {
            if ($qualite->getTypeQualite() === $typeRecherche) {
                $compatible++;
            }
            $nbQualite++;
        }
        return round(($compatible*100)/$nbQualite);

    }
}