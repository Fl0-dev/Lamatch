<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidat/", name="candidat_")
 */
class CandidatController extends AbstractController
{
    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(): Response
    {
        return $this->render('candidat/ajout.html.twig', [
            'controller_name' => 'CandidatController',
        ]);
    }
}
