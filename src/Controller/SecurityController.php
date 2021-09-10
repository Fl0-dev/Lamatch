<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * permet à un utilisateur de se logger
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @param Request $request
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils,Request $request): Response
    {
        //récupération de la route pour la redirection
        $routeName = $request->get('_route');
        // récupère une erreur si erreur
        $error = $authenticationUtils->getLastAuthenticationError();
        // récupération du dernier nom pour ne pas laisser le champ vide
        $lastUsername = $authenticationUtils->getLastUsername();
        //envoie vers la twig
        return $this->render('security/login.html.twig', [
            'route'=>$routeName,
            'last_username' => $lastUsername,
            'error' => $error]);
    }

    /**
     * permet à un utilisateur de se déconnecter
     * @Route("/logout", name="app_logout")
     * @return Response
     */
    public function logout(): Response
    {
        //redirection vers la page de login
        return $this->redirectToRoute('app_login');

    }
}
