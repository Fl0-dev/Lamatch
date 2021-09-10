<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Competence;
use App\Form\CompetenceType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/competence", name="competence_")
 */
class CompetenceController extends AbstractController
{
    /**
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/ajout/{id}", name="ajout")
     */
    public function ajout(Request $request,
                          EntityManagerInterface $entityManager,
                          Candidat $candidat): Response
    {
        //création d'une compétence
        $competence = new Competence();
        //utilisation du form de competence
        $form = $this->createForm(CompetenceType::class,$competence);
        //et envoie du form en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {
            //enregistrement en BD
            $candidat->addCompetence($competence);
            $entityManager->persist($competence);
            $entityManager->flush();
            $this->addFlash('success', 'Votre compétence a bien été ajoutée.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
        }
        return $this->render('competence/ajout.html.twig', [
            'formCompetence'=>$form->createView(),
            'candidat'=>$candidat,
        ]);
    }

    /**
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route ("/supprimer/{id}", name="supprimer")
     * @param Competence $competence
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function supprimer(Competence $competence,
                             Request $request,
                             EntityManagerInterface $entityManager):Response
    {
            $candidat = $this->getUser()->getCandidat();
            //enregistrement en BD
            $candidat->removeCompetence($competence);
            $entityManager->flush();
            $this->addFlash('success', 'Votre compétence a bien été supprimée.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);

    }
}
