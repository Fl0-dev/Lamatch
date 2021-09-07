<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Repository\EntrepriseRepository;
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
    public function matchingCandidat(Candidat $candidat,
                                     MatchingServices $matchingServices,
                                     EntrepriseRepository $entrepriseRepository): Response
    {
        //tableau pour stocker chaque matching

        $listEntreprise= [];
        //récupération de toutes les entreprises
        $entreprises = $entrepriseRepository->findAll();
        //pour chaque entreprise
        foreach ($entreprises as $entreprise){
            //calcul du pourcentage de matching
            $pourcentage=$matchingServices->MatchingCandidatEntreprise($candidat,$entreprise);
            //récupération de l'entreprise et de son pourcentage dans un tableau
            $employeur['entreprise']=$entreprise;
            $employeur['pourcentage']=$pourcentage;
            //stockage dans un tableau récapitulatif
            $listEntreprise[]=$employeur;
        }

        //envoie vers la twig
        return $this->render('matching/PourCandidat.html.twig', [
            'listEntreprise' => $listEntreprise,
            'candidat'=>$candidat,
        ]);
    }
}
