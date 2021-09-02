<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Formation;
use App\Form\FormationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/formation", name="formation_")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/ajout/{id}", name="ajout")
     */
    public function ajout(Request $request,
                          EntityManagerInterface $entityManager,
                          Candidat $candidat): Response
    {


        //création d'une formation
        $formation = new Formation();
        //utilisation du form de candidat
        $form = $this->createForm(FormationType::class,$formation);
        //et envoie du form en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en BD
            $formation->setCandidat($candidat);
            $entityManager->persist($formation);
            $entityManager->flush();
            $this->addFlash('success', 'Votre formation a bien été inscrite.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
        }
        return $this->render('formation/ajout.html.twig', [
            'formFormation'=>$form->createView(),
            'candidat'=>$candidat,
        ]);
    }
}
