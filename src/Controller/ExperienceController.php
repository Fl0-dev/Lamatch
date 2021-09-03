<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Experience;
use App\Form\ExperienceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/experience", name="experience_")
 */
class ExperienceController extends AbstractController
{
    /**
     * @Route("/ajout/{id}", name="ajout")
     */
    public function ajout(Request $request,
                          EntityManagerInterface $entityManager,
                          Candidat $candidat): Response
    {
        //création d'une entreprise
        $experience = new Experience();
        //utilisation du form de formation
        $form = $this->createForm(ExperienceType::class,$experience);
        //et envoie du form en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en BD
            $experience->setCandidat($candidat);
            $entityManager->persist($experience);
            $entityManager->flush();
            $this->addFlash('success', 'Votre experience a bien été inscrite.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
        }
        return $this->render('experience/ajout.html.twig', [
            'formExperience'=>$form->createView(),
            'candidat'=>$candidat,
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifier(Experience $experience,
                             Request $request,
                             EntityManagerInterface $entityManager):Response
    {
        //utilisation du form de experience
        $form = $this->createForm(ExperienceType::class,$experience);
        //envoie en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en BD
            $entityManager->flush();
            $this->addFlash('success', 'Votre expérience a bien été modifiée.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$experience->getCandidat()->getId()]);
        }
        return $this->render('experience/modifier.html.twig', [
            'formExperience'=>$form->createView(),
            'experience'=>$experience,
        ]);

    }
}

