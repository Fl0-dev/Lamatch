<?php

namespace App\Services;

use App\Entity\Candidat;
use App\Entity\Entreprise;
use App\Repository\TypeQualiteRepository;

class GestionListQualites
{
    /**
     * Permet d'avoir un pourcentage de compatibilité entre les traits de caractère
     * d'un candidat et le profil recherché par l'entreprise
     * @param Candidat $candidat
     * @param Entreprise $entreprise
     * @return float
     */
    public function TypeQualiteMaxCandidat(Candidat $candidat, Entreprise $entreprise){
        //récupération des qualités du candidat
        $qualites=$candidat->getListQualites();
        //récupération du type de qualité recherché par l'entreprise
        $typeRecherche= $entreprise->getTraitDeCaractereSouhaite();
        //indice de compatibilité
        $compatible=0;
        $nbQualite=0;
        //pour chaque qualité
        foreach ($qualites as $qualite) {
            //si elle fait parti du type recherché
            if ($qualite->getTypeQualite() === $typeRecherche) {
                //on incrémente
                $compatible++;
            }
            $nbQualite++;
        }
        //retourne un pourcentage
        return round(($compatible*100)/$nbQualite);

    }
}