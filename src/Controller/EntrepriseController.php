<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Services\MatchingServices;
use App\Services\UploadImage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/entreprise", name="entreprise_")
 */
class EntrepriseController extends AbstractController
{

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(Request $request,
                          UploadImage $uploadImage,
                          EntityManagerInterface $entityManager,
                          MatchingServices $matchingServices): Response
    {
        //création d'une entreprise
        $entreprise = new Entreprise();
        //utilisation du form de entreprise
        $form = $this->createForm(EntrepriseType::class,$entreprise);
        //et envoie du form en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {

            //gestion du logo
            /** @var UploadedFile $dossierPhotos */
            $dossierPhotos = $form->get('logo')->getData();
            if ($dossierPhotos) {
                $nomDeFichier = $uploadImage->uploadImage($dossierPhotos);try {
                    $dossierPhotos->move(
                        $this->getParameter('photo_dossier'),
                        $nomDeFichier
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', "Soucis lors de l'enregistrement. Désolé");
                }
                $entreprise->setLogo($nomDeFichier);
            }
            //relie entreprise et user
            $entreprise->setUser($this->getUser());

            //hydratation du matching
            $matchingServices->matchingEntreprise($entreprise);
            //on inscrit en BD
            $entityManager->persist($entreprise);
            $entityManager->flush();

            $this->addFlash('success', 'Votre profil a bien été complété.');
            return $this->redirectToRoute('accueil');
        }
            return $this->render('entreprise/ajout.html.twig', [
                'formEntreprise' => $form->createView(),
                'entreprise'=>$entreprise,
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifier(Entreprise $entreprise,
                             EntityManagerInterface $entityManager,
                             Request $request,
                             UploadImage $uploadImage,
                             MatchingServices $matchingServices):Response
    {
    //utilisation du form de entreprise
        $form = $this->createForm(EntrepriseType::class,$entreprise);
        //et envoie du form en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {

            //gestion du logo
            /** @var UploadedFile $dossierPhotos */
            $dossierPhotos = $form->get('logo')->getData();
            if ($dossierPhotos) {
                $nomDeFichier = $uploadImage->uploadImage($dossierPhotos);try {
                    $dossierPhotos->move(
                        $this->getParameter('photo_dossier'),
                        $nomDeFichier
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', "Soucis lors de l'enregistrement. Désolé");
                }
                $entreprise->setLogo($nomDeFichier);
            }

            //hydratation du matching
            $matchingServices->matchingEntreprise($entreprise);
            //on inscrit en BD
            $entityManager->flush();

            $this->addFlash('success', 'Votre profil a bien été complété.');
            return $this->redirectToRoute('accueil');
        }
        return $this->render('entreprise/modifier.html.twig', [
            'formEntreprise' => $form->createView(),
            'entreprise'=>$entreprise,
        ]);
    }



}
