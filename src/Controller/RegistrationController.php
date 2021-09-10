<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * permet d'enregistrer un nouvel utilisateur
     * @Route("/register/{route}", name="app_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param $route
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder,$route): Response
    {
        //création d'un utilisateur
        $user = new User();
        //attribution du rôle
        $user->setRoles(["ROLE_USER"]);
        // mise en état actif
        $user->setEtat(true);
        //utilisation du formulaire d'enregistrement'
        $form = $this->createForm(RegistrationFormType::class, $user);
        //envoie le formulaire en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            // encode le password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            //inscrit en base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
                //redirection vers la route précédente
                return $this->redirectToRoute($route);
        }
        //envoie le formulaire
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
