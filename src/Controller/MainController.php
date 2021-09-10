<?php

namespace App\Controller;

use App\Repository\CandidatRepository;
use App\Repository\EntrepriseRepository;
use App\Services\Suppression;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * page d'acceuil du site qui explique le fonctionnement
     * @Route("/", name="home")
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * page d'accueil une fois loggé
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/accueil", name="accueil")
     * @param Suppression $suppression
     * @return Response
     */
    public function accueil(Suppression $suppression,
                            EntrepriseRepository $entrepriseRepository,
                            CandidatRepository $candidatRepository): Response
    {
        //gestion des users inactifs depuis un mois
        $suppression->suppression();

        //récupération du nombre d'entreprises et de candidats actifs sur le site
        $nbCandidats = count($candidatRepository->findAllCandidatsActifs());
        $nbEntreprises = count($entrepriseRepository->findAllEntreprisesActives());

        //récupération de l'utilisateur
        $user = $this->getUser();

        //si l'utilisateur a été mis inactif
        if($user->getEtat()==false){
            return $this->render('bundles/TwigBundle/Exception/inactifUser.html.twig');
        }
        //si administrateur
        $userRoles = $user->getRoles();
        if (in_array('ROLE_ADMIN',$userRoles)){
            return $this->render('main/accueil.html.twig', [
                'nbCandidats'=>$nbCandidats,
                'nbEntreprises'=>$nbEntreprises,
        ]);
        }
        //si première connexion
        if ($user->getType()==true && $user->getCandidat()==null){//si candidat
            return $this->redirectToRoute('candidat_ajout');
        }
        if ($user->getType()==false && $user->getEntreprise()==null){//si entreprise
            return $this->redirectToRoute('entreprise_ajout');
        }

        //envoie à la vue
        return $this->render('main/accueil.html.twig',[
            'candidat'=>$user->getCandidat(),
            'entreprise'=>$user->getEntreprise(),
            'nbCandidats'=>$nbCandidats,
            'nbEntreprises'=>$nbEntreprises,
        ]);
    }
}
