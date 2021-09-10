<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
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
 * @Route("/entreprise", name="entreprise_")
 */
class EntrepriseController extends AbstractController
{

    /**
     * Permet de faire la liaison entre l'utilisateur et l'entreprise et enregistrement
     * des premiers attributs
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
        //création d'une entreprise
        $entreprise = new Entreprise();
        //utilisation du formulaire de entreprise
        $form = $this->createForm(EntrepriseType::class,$entreprise);
        //et envoie du formulaire en requête
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
            //relie entreprise et utilisateurr
            $entreprise->setUser($this->getUser());
            //on inscrit en base de données
            $entityManager->persist($entreprise);
            $entityManager->flush();

            $this->addFlash('success', 'Votre profil a bien été complété.');
            return $this->redirectToRoute('accueil');
        }
            //envoie du formulaire
            return $this->render('entreprise/ajout.html.twig', [
                'formEntreprise' => $form->createView(),
                'entreprise'=>$entreprise,
        ]);
    }

    /**
     * permet à une entreprise de modifier son profil
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/modifier/{id}", name="modifier")
     * @param Entreprise $entreprise
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @param UploadImage $uploadImage
     * @return Response
     */
    public function modifier(Entreprise $entreprise,
                             EntityManagerInterface $entityManager,
                             Request $request,
                             UploadImage $uploadImage):Response
    {
        //utilisation du formulaire de entreprise
        $form = $this->createForm(EntrepriseType::class,$entreprise);
        //et envoie du formulaire en requête
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
            //on inscrit en base de données
            $entityManager->flush();
            //redirection vers l'accueil
            $this->addFlash('success', 'Votre profil a bien été complété.');
            return $this->redirectToRoute('accueil');
        }
        //envoie du formulaire
        return $this->render('entreprise/modifier.html.twig', [
            'formEntreprise' => $form->createView(),
            'entreprise'=>$entreprise,
        ]);
    }

    /**
     * permet l'affichage du profil de l'entreprise
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")
     * @Route("/profil/{id}", name="profil")
     * @param Entreprise $entreprise
     * @return Response
     */
    public function profil(Entreprise $entreprise):Response
    {
        return $this->render('entreprise/profil.html.twig',[
            'entreprise' => $entreprise,
        ]);
    }


}
