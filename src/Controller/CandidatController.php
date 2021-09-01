<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/candidat", name="candidat_")
 */
class CandidatController extends AbstractController
{
    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(Request $request,SluggerInterface $slugger,EntityManagerInterface $entityManager): Response
    {

        //création d'un candidat
        $candidat = new Candidat();
        //utilisation du form de candidat
        $form = $this->createForm(CandidatType::class,$candidat);
        //et envoie du form en requête
        $form->handleRequest($request);
        //si valide
        if ($form->isSubmitted() && $form->isValid()) {

            //gestion de la photo
            /** @var UploadedFile $dossierPhotos */
            $dossierPhotos = $form->get('photo')->getData();
            if ($dossierPhotos) {
                $nomOriginalDeFichier = pathinfo($dossierPhotos->getClientOriginalName(), PATHINFO_FILENAME);
                //on change le nom du fichier
                $nomDeFichierSecur = $slugger->slug($nomOriginalDeFichier);
                $nomDeFichier = $nomDeFichierSecur . '-' . uniqid() . '.' . $dossierPhotos->guessExtension();
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
            'candidat'=>$candidat,
        ]);
    }

    public function modifier(): Response
    {
        return $this->render('candidat/ajout.html.twig');
    }


}
