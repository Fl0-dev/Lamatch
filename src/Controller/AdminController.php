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
     * @Route("/backOffice", name="backOffice")
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
     * @Route("/gestionCandidats", name="gestionCandidats")
     */
    public function listCandidat(CandidatRepository $candidatRepository,Request $request):Response
    {
        //récupération de la route pour la redirection dans lieu
        $routeName = $request->get('_route');
        //récupération de la liste des candidats
        $candidats = $candidatRepository->findAll();
        return $this->render('admin/gestionCandidats.html.twig',[
            'candidats'=>$candidats,
            'route'=>$routeName,
        ]);
    }

    /**
     * @Route("/gestionEntreprises", name="gestionEntreprises")
     */
    public function listEntreprise(EntrepriseRepository $entrepriseRepository,Request $request):Response
    {
        //récupération de la route pour la redirection dans lieu
        $routeName = $request->get('_route');
        //récupération de la liste des entreprises
        $entreprises = $entrepriseRepository->findAll();
        return $this->render('admin/gestionEntreprises.html.twig',[
            'entreprises'=>$entreprises,
            'route'=>$routeName
        ]);
    }

    /**
     * @Route("/gestionEtat/{id}/{route}", name="gestionEtat")
     */
    public function GestionEtat(User $user,$route,EntityManagerInterface $entityManager):Response
    {
        //récupération de son rôle
        $userRoles =$user->getRoles();
        //date du jour
        $date = new \DateTime();
        if (in_array('ROLE_USER',$userRoles)) {

            $user->setRoles([""]);
            $user->setEtat(false);
            $user->setDateModiff($date);
        }else{
            $user->setRoles(["ROLE_USER"]);
            $user->setEtat(true);
            $user->setDateModiff(null);
        }
        $entityManager->flush();
        return $this->redirectToRoute($route);

    }
}
