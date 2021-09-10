<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CandidatRepository;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * page d'accueil pour l'administrateur/trice
     * @Route("/backOffice", name="backOffice")
     * @param Request $request
     * @return Response
     */
    public function backOffice(Request $request): Response
    {
        //récupération de la route pour la redirection si ajout nouvel utilisateur
        $routeName = $request->get('_route');
        return $this->render('admin/backOffice.html.twig',[
            'route'=>$routeName,
        ]);
    }

    /**
     * affiche la liste de tous les candidats inscrits sur le site
     * @Route("/gestionCandidats", name="gestionCandidats")
     * @param CandidatRepository $candidatRepository
     * @param Request $request
     * @return Response
     */
    public function listCandidat(CandidatRepository $candidatRepository,Request $request):Response
    {
        //récupération de la route pour la redirection quand on a ouvert un profil
        $routeName = $request->get('_route');
        //récupération de la liste des candidats
        $candidats = $candidatRepository->findAll();
        return $this->render('admin/gestionCandidats.html.twig',[
            'candidats'=>$candidats,
            'route'=>$routeName,
        ]);
    }

    /**
     * affiche la liste de toutes les entreprises inscrites sur le site
     * @Route("/gestionEntreprises", name="gestionEntreprises")
     * @param EntrepriseRepository $entrepriseRepository
     * @param Request $request
     * @return Response
     */
    public function listEntreprise(EntrepriseRepository $entrepriseRepository,Request $request):Response
    {
        //récupération de la route pour la redirection quand on a ouvert un profil
        $routeName = $request->get('_route');
        //récupération de la liste des entreprises
        $entreprises = $entrepriseRepository->findAll();
        return $this->render('admin/gestionEntreprises.html.twig',[
            'entreprises'=>$entreprises,
            'route'=>$routeName
        ]);
    }

    /**
     * permet de rendre un utilisateur inactif sur le site en
     * supprimant son rôle, changeant le booléen etat en false et en valorisant une date de modification
     *permettant ensuite de le supprimer au bout d'un mois
     * @Route("/gestionEtat/{id}/{route}", name="gestionEtat")
     * @param User $user
     * @param $route
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function GestionEtat(User $user,$route,EntityManagerInterface $entityManager):Response
    {
        //récupération de son rôle
        $userRoles =$user->getRoles();
        //date du jour
        $date = new \DateTime();
        //si rôle rend inactif
        if (in_array('ROLE_USER',$userRoles)) {
            $user->setRoles([""]);
            $user->setEtat(false);
            $user->setDateModiff($date);
            //sinon rend actif
        }else{
            $user->setRoles(["ROLE_USER"]);
            $user->setEtat(true);
            $user->setDateModiff(null);
        }
        //inscrit en base de données
        $entityManager->flush();
        //redirection
        return $this->redirectToRoute($route);

    }
}
