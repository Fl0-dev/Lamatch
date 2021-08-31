<?php

namespace App\Controller;

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
    public function index(Request $request): Response
    {
        //récupération de la route pour la redirection dans lieu
        $routeName = $request->get('_route');
        return $this->render('admin/backOffice.html.twig',[
            'route'=>$routeName,
        ]);
    }
}
