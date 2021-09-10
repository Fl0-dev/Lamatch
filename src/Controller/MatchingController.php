<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Entreprise;
use App\Repository\CandidatRepository;
use App\Repository\EntrepriseRepository;
use App\Services\MatchingServices;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/matching/", name="matching_")
 */
class MatchingController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/candidat/{id}", name="candidat")
     */
    public function matchingCandidat(Candidat $candidat,
                                     MatchingServices $matchingServices,
                                     EntrepriseRepository $entrepriseRepository): Response
    {
        //tableau pour stocker chaque matching
        $listEntreprise= [];
        //récupération de toutes les entreprises actives
        $entreprises = $entrepriseRepository->findAllEntrepriseActif();
        //pour chaque entreprise
        foreach ($entreprises as $entreprise){
            //calcul du pourcentage de matching
            $pourcentage=$matchingServices->Matching($candidat,$entreprise);
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

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/entreprise/{id}", name="entreprise")
     */
    public function matchingEntreprise(Entreprise $entreprise,
                                     MatchingServices $matchingServices,
                                     CandidatRepository $candidatRepository): Response
    {
        //tableau pour stocker chaque matching
        $listCandidat= [];
        //récupération de toutes les entreprises
        $candidats = $candidatRepository->findAll();
        //pour chaque candidat
        foreach ($candidats as $candidat){
            //calcul du pourcentage de matching
            $pourcentage=$matchingServices->Matching($candidat,$entreprise);
            //récupération du candidat et de son pourcentage dans un tableau
            $postulant['candidat']=$candidat;
            $postulant['pourcentage']=$pourcentage;
            //stockage dans un tableau récapitulatif
            $listCandidat[]=$postulant;
        }
        //envoie vers la twig
        return $this->render('matching/PourEntreprise.html.twig', [
            'listCandidat' => $listCandidat,
            'entreprise'=>$entreprise,
        ]);
    }
}
