<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprise/", name="entreprise_")
 */
class EntrepriseController extends AbstractController
{

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(): Response
    {
        return $this->render('entreprise/ajout.html.twig', [
            'controller_name' => 'CandidatController',
        ]);
    }
}
