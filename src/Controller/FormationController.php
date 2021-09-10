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
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/ajout/{id}", name="ajout")
     */
    public function ajout(Request $request,
                          EntityManagerInterface $entityManager,
                          Candidat $candidat): Response
    {
        //création d'une formation
        $formation = new Formation();
        //utilisation du form de formation
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

    /**
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifier(Formation $formation,
                             Request $request,
                             EntityManagerInterface $entityManager):Response
    {
        //utilisation du form de formation
        $form = $this->createForm(FormationType::class,$formation);
        //envoie en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en BD
            $entityManager->flush();
            $this->addFlash('success', 'Votre formation a bien été modifiée.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$formation->getCandidat()->getId()]);
        }
        return $this->render('formation/modifier.html.twig', [
            'formFormation'=>$form->createView(),
            'formation'=>$formation,
        ]);
    }

    /**
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/supprimer/{id}", name ="supprimer")
     */
    public function supprimer(Formation $formation,EntityManagerInterface $entityManager):Response
    {
        $candidat = $formation->getCandidat();
        $entityManager->remove($formation);
        $entityManager->flush();
        $this->addFlash('success', 'La formation a bien été supprimée.');

        return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
    }
}
