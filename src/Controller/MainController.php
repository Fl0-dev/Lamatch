<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil(): Response
    {
        //récupération de l'utilisateur
        $user = $this->getUser();
        $userRoles = $user->getRoles();
        if (in_array('ROLE_ADMIN',$userRoles)){
            return $this->render('main/accueil.html.twig');
        }
        //si première connexion
        if ($user->getType()==true && $user->getCandidat()==null){//si candidat
            return $this->redirectToRoute('candidat_ajout');
        }
        if ($user->getType()==false && $user->getEntreprise()==null){//si entreprise
            return $this->redirectToRoute('entreprise_ajout');
        }
        $candidat = $user->getCandidat();
        return $this->render('main/accueil.html.twig',[
            'candidat'=>$candidat,
        ]);
    }
}
