<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Services\Matching;
use App\Services\MatchingServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/matching/", name="matching_")
 */
class MatchingController extends AbstractController
{
    /**
     * @Route("/candidat/{id}", name="candidat")
     */
    public function matchingCandidat(Candidat $candidat,MatchingServices $matchingServices): Response
    {
        $matchingServices->matchingCandidat($candidat);
        return $this->render('matching/index.html.twig', [
            'controller_name' => 'MatchingController',
        ]);
    }
}
