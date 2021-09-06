<?php

namespace App\Services;

use App\Repository\MatchingRepository;

class Matching
{
    public function matchingCandidat($candidat, MatchingRepository $matchingRepository)
    {
        //récupération de tous les matching des entreprises
        $matchingsEntreprise = $matchingRepository->findBy([]);
    }

}