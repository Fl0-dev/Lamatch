<?php

namespace App\Controller;

use App\Repository\CandidatRepository;
use App\Repository\EntrepriseRepository;
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
    public function listCandidat(CandidatRepository $candidatRepository):Response
    {
        //récupération de la liste des candidats
        $candidats = $candidatRepository->findAll();
        return $this->render('admin/gestionCandidats.html.twig',[
            'candidats'=>$candidats,
        ]);
    }

    /**
     * @Route("/gestionEntreprises", name="gestionEntreprises")
     */
    public function listEntreprise(EntrepriseRepository $entrepriseRepository):Response
    {
        //récupération de la liste des entreprises
        $entreprises = $entrepriseRepository->findAll();
        return $this->render('admin/gestionEntreprises.html.twig',[
            'entreprises'=>$entreprises,
        ]);
    }
}
