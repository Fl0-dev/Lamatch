<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\FormationRepository;
use App\Services\MatchingServices;
use App\Services\UploadImage;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidat", name="candidat_")
 */
class CandidatController extends AbstractController
{
    /**
     * Liaison d'un utilisateur avec l'Entity Candidat et enregistrement
     * premiers des attributs
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/ajout", name="ajout")
     * @param Request $request
     * @param UploadImage $uploadImage
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function ajout(Request $request,
                          UploadImage $uploadImage,
                          EntityManagerInterface $entityManager): Response
    {

        //création d'un candidat
        $candidat = new Candidat();
        //utilisation du formulaire de candidat
        $form = $this->createForm(CandidatType::class,$candidat);
        //et envoie du formulaire en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {

            //gestion de la photo
            /** @var UploadedFile $dossierPhotos */
            $dossierPhotos = $form->get('photo')->getData();
            if ($dossierPhotos) {

                $nomDeFichier = $uploadImage->uploadImage($dossierPhotos);
                try {
                    $dossierPhotos->move(
                        $this->getParameter('photo_dossier'),
                        $nomDeFichier
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', "Soucis lors de l'enregistrement. Désolé");
                }
                $candidat->setPhoto($nomDeFichier);
            }
            //calcul age
            $dateNaissance = $candidat->getDateNaissance();
            $stringDateNaissance = $dateNaissance->format('Y');
            $age = date('Y')- $stringDateNaissance;
            $candidat->setAge($age);

            //relie candidat et utilisateur
            $candidat->setUser($this->getUser());
            //on inscrit en base de données
            $entityManager->persist($candidat);
            $entityManager->flush();
            // redirection vers l'accueil
            $this->addFlash('success', 'Vous pouvez ajouter des formations, des expériences et des compétences.');
            return $this->redirectToRoute('candidat_modifier',['id'=>$candidat->getId()]);
        }
        // envoie le formulaire
        return $this->render('candidat/ajout.html.twig', [
            'formCandidat' => $form->createView(),
            'candidat'=>$candidat,
        ]);
    }

    /**
     * permet à un candidat de compléter son profil et de le modifier
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/modifier/{id}", name="modifier")
     * @param Candidat $candidat
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @param UploadImage $uploadImage
     * @return Response
     */
    public function modifier(Candidat $candidat,
                             EntityManagerInterface $entityManager,
                             Request $request,
                             UploadImage $uploadImage): Response
    {

        //utilisation du formulaire de candidat
        $form = $this->createForm(CandidatType::class,$candidat);
        //et envoie du formulaire en requête
        $form->handleRequest($request);
        //si valide
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {

            //gestion de la photo
            /** @var UploadedFile $dossierPhotos */
            $dossierPhotos = $form->get('photo')->getData();
            if ($dossierPhotos) {

                $nomDeFichier = $uploadImage->uploadImage($dossierPhotos);
                try {
                    $dossierPhotos->move(
                        $this->getParameter('photo_dossier'),
                        $nomDeFichier
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', "Soucis lors de l'enregistrement. Désolé");
                }
                $candidat->setPhoto($nomDeFichier);
            }
            //calcul age
            $dateNaissance = $candidat->getDateNaissance();
            $stringDateNaissance = $dateNaissance->format('Y');
            $age = date('Y')- $stringDateNaissance;
            $candidat->setAge($age);

            //on inscrit en base de données
            $entityManager->flush();
            // redirection vers l'accueil
            $this->addFlash('success', 'Votre profil a bien été complété.');
            return $this->redirectToRoute('accueil');
        }
        //envoie le formulaire
        return $this->render('candidat/modifier.html.twig', [
            'formCandidat' => $form->createView(),
            'candidat'=>$candidat,
        ]);
    }

    /**
     * affiche le profil du candidat
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/profil/{id}", name="profil")
     * @param Candidat $candidat
     * @return Response
     */
    public function profil(Candidat $candidat):Response
    {
        return $this->render('candidat/profil.html.twig',[
            'candidat' => $candidat,
        ]);
    }

}
