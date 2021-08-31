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

        //si première connexion
        if ($user->getType()==true && $user->getCandidat()==null){//si candidat
            return $this->redirectToRoute('');
        }
        if ($user->getType()==false && $user->getEntreprise()==null){//si entreprise
            return $this->redirectToRoute('');
        }
        //sinon page d'accueil
        return $this->render('main/accueil.html.twig');
    }
}
