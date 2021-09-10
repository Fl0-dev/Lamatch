<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Experience;
use App\Form\ExperienceType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
     * permet à un candidat d'ajouter une expérience professionnelle
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/ajout/{id}", name="ajout")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param Candidat $candidat
     * @return Response
     */
    public function ajout(Request $request,
                          EntityManagerInterface $entityManager,
                          Candidat $candidat): Response
    {
        //création d'une entreprise
        $experience = new Experience();
        //utilisation du formulaire de formation
        $form = $this->createForm(ExperienceType::class,$experience);
        //et envoie du formulaire en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en base de données
            $experience->setCandidat($candidat);
            $entityManager->persist($experience);
            $entityManager->flush();
            //redirection vers la modification de profil
            $this->addFlash('success', 'Votre experience a bien été inscrite.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
        }
        //envoie le formulaire
        return $this->render('experience/ajout.html.twig', [
            'formExperience'=>$form->createView(),
            'candidat'=>$candidat,
        ]);
    }

    /**
     * permet à un candidat de modifier une expérience
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/modifier/{id}", name="modifier")
     * @param Experience $experience
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function modifier(Experience $experience,
                             Request $request,
                             EntityManagerInterface $entityManager):Response
    {
        //utilisation du formulaire de experience
        $form = $this->createForm(ExperienceType::class,$experience);
        //envoie du formulaire en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en bsa de données
            $entityManager->flush();
            //redirection vers la modification de profil
            $this->addFlash('success', 'Votre expérience a bien été modifiée.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$experience->getCandidat()->getId()]);
        }
        //envoie du formulaire
        return $this->render('experience/modifier.html.twig', [
            'formExperience'=>$form->createView(),
            'experience'=>$experience,
        ]);
    }

    /**
     * Permet à un candidat de supprimer une expérience
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/supprimer/{id}", name ="supprimer")
     * @param Experience $experience
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function supprimer(Experience $experience,EntityManagerInterface $entityManager):Response
    {
        //récupération du candidat
        $candidat = $experience->getCandidat();
        //enregistrement en base de données
        $entityManager->remove($experience);
        $entityManager->flush();
        //redirection vers la modification de profil
        $this->addFlash('success', 'L\'expérience a bien été supprimée.');
        return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
    }
}

