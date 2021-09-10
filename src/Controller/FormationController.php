<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Formation;
use App\Form\FormationType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
     * permet à un candidat d'ajouter une formation
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
        //création d'une formation
        $formation = new Formation();
        //utilisation du formulaire de formation
        $form = $this->createForm(FormationType::class,$formation);
        //et envoie du formulaire en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en base de données
            $formation->setCandidat($candidat);
            $entityManager->persist($formation);
            $entityManager->flush();
            //redirection vers la modification de profil
            $this->addFlash('success', 'Votre formation a bien été inscrite.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
        }
        //envoie du formulaire
        return $this->render('formation/ajout.html.twig', [
            'formFormation'=>$form->createView(),
            'candidat'=>$candidat,
        ]);
    }

    /**
     * permet à un candidat de modifier une formation
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/modifier/{id}", name="modifier")
     * @param Formation $formation
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function modifier(Formation $formation,
                             Request $request,
                             EntityManagerInterface $entityManager):Response
    {
        //utilisation du formulaire de formation
        $form = $this->createForm(FormationType::class,$formation);
        //envoie du formulaire en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en base de données
            $entityManager->flush();
            //redirection vers la modification de profil
            $this->addFlash('success', 'Votre formation a bien été modifiée.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$formation->getCandidat()->getId()]);
        }
        //envoie du formulaire
        return $this->render('formation/modifier.html.twig', [
            'formFormation'=>$form->createView(),
            'formation'=>$formation,
        ]);
    }

    /**
     * permet à un candiadt de supprimer une formation
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/supprimer/{id}", name ="supprimer")
     * @param Formation $formation
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function supprimer(Formation $formation,EntityManagerInterface $entityManager):Response
    {
        //récupération du candidat
        $candidat = $formation->getCandidat();
        //enregistrement en base de données
        $entityManager->remove($formation);
        $entityManager->flush();
        //redirection vers la modification de profil
        $this->addFlash('success', 'La formation a bien été supprimée.');
        return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
    }
}
