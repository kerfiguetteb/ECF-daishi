<?php

namespace App\Controller;

use App\Entity\Emprunt;
use App\Repository\EmpruntRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/emprunt")
 */

class EmpruntController extends AbstractController
{
    /**
     * @Route("/emprunt", name="emprunt_index", methods={"GET"})
     */
    public function index(EmpruntRepository $empruntRepository): Response
    {
        return $this->render('emprunt/index.html.twig', [
            'emprunt' => $empruntRepository->findAll(),
        ]);
    }
    // public function new(Request $request): Response
    // {
    //     $emprunt = new Emprunt();
    //     $form = $this->createForm(EmpruntType::class, $emprunt);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($emprunt);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('emprunt_show', [
    //             'id' => $emprunt->getId(),
    //         ]);
    //     }

    //     return $this->render('emprunt/new.html.twig', [
    //         'emprunt' => $emprunt,
    //         'form' => $form->createView(),
    //     ]);
    // }


}
