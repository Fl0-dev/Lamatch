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
     * permet de lancer un matching pour un candidat avec toutes
     * les entreprises actives du site
     * @IsGranted("ROLE_USER")
     * @Route("/candidat/{id}", name="candidat")
     * @param Candidat $candidat
     * @param MatchingServices $matchingServices
     * @param EntrepriseRepository $entrepriseRepository
     * @return Response
     */
    public function matchingCandidat(Candidat $candidat,
                                     MatchingServices $matchingServices,
                                     EntrepriseRepository $entrepriseRepository): Response
    {
        //tableau pour stocker chaque matching
        $listEntreprise= [];
        //récupération de toutes les entreprises actives
        $entreprises = $entrepriseRepository->findAllEntreprisesActives();
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
     * permet de lancer un matching pour un entreprise avec tous
     * les candidats actifs du site
     * @IsGranted("ROLE_USER")
     * @Route("/entreprise/{id}", name="entreprise")
     * @param Entreprise $entreprise
     * @param MatchingServices $matchingServices
     * @param CandidatRepository $candidatRepository
     * @return Response
     */
    public function matchingEntreprise(Entreprise $entreprise,
                                     MatchingServices $matchingServices,
                                     CandidatRepository $candidatRepository): Response
    {
        //tableau pour stocker chaque matching
        $listCandidat= [];
        //récupération de tous les candidats actifs
        $candidats = $candidatRepository->findAllCandidatsActifs();
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
