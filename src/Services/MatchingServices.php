<?php

namespace App\Services;

use App\Entity\Matching;
use App\Repository\EntrepriseRepository;
use App\Repository\MatchingRepository;

class MatchingServices
{
    public function matchingCandidat($candidat)
    {

        //hydratation des matchings
        //candidat
        $matching = new Matching();
        $matching->setValeurPrincipale($candidat->getValeurPrincipale());



    }

}