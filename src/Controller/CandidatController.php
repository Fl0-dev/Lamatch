<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidat/", name="candidat_")
 */
class CandidatController extends AbstractController
{
    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(Request $request,EntityManagerInterface $entityManager): Response
    {

        //création d'un candidat
        $candidat = new Candidat();

        //utilisation du form de candidat
        $form = $this->createForm(CandidatType::class,$candidat);
        //et envoie du form en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //relie candidat et user
            $candidat->setUser($this->getUser());
            //on inscrit en BD
            $entityManager->persist($candidat);
            $entityManager->flush();

            $this->addFlash('success', 'Votre profil a bien été complété.');
            return $this->redirectToRoute('accueil');
        }
        return $this->render('candidat/ajout.html.twig', [
            'formCandidat' => $form->createView(),
        ]);
    }
}
