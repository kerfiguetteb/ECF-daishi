<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmprunteurController extends AbstractController
{
    /**
     * @Route("/emprunteur", name="emprunteur")
     */
    public function index(): Response
    {
        return $this->render('emprunteur/index.html.twig', [
            'controller_name' => 'EmprunteurController',
        ]);
    }
}
