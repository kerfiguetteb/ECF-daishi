<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Livre;
use App\Repository\LivreRepository;
use App\Repository\EmprunteurRepository;
use App\Repository\AuteurRepository;
use App\Repository\EmpruntRepository;
use App\Repository\GenreRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(
        LivreRepository $livreRepository,
        EmprunteurRepository $emprunteurRepository,
        EmpruntRepository $empruntRepository,
        AuteurRepository $auteurRepository,
        GenreRepository $genreRepository,
        UserRepository $userRepository): Response

    {
        $entityManager = $this->getDoctrine()->getManager();
       
        // - USER -
    //  la liste complète de tous les utilisateurs (de la table `user`)
        $user = $userRepository->findAll();
        // dump($user);

    // - les données de l'utilisateur dont l'id est `1`
        $user = $userRepository->find(1);
        // dump($user);


    // - les données de l'utilisateur dont l'email est `foo.foo@example.com`
        $email = 'foo.foo@example.com';
        $users = $userRepository->findByEmail($email);
        // dump($users);

    // - les données des utilisateurs dont l'attribut `roles` contient le mot clé `ROLE_EMRUNTEUR`
        // $emprunteurRoles = $userRepository->findByRole('ROLE_EMPRUNTEUR');
        // dump($emprunteurRoles);



        // - LIVRE -
    // - la liste complète de tous les livres
        $livre = $livreRepository->findAll();
        // dump($livre);

    // - les données du livre dont l'id est `1`
        $livre = $livreRepository->find(1);
        // dump($livre);

    // - la liste des livres dont le titre contient le mot clé `lorem`
        $titre = 'lorem';
        $livres = $livreRepository->findByTitre($titre);
        // dump($livres);

    // - la liste des livres dont l'id de l'auteur est `2`
        $livres = $auteurRepository->find(2);
        // dump($livres);

    // - la liste des livres dont le genre contient le mot clé `roman`
        $livres = $genreRepository->findByNom('roman');
        // dump($livres);
 
    //- ajouter un nouveau livre
        $auteurs = $auteurRepository->findAll();
        $auteur = $auteurs[1]->setNom('Cartier');
        $auteur = $auteurs[1]->setPrenom('Huges');
    
        $livre->setTitre('Totum autem id externum');
        $livre->setAnneeEdition(2020);
        $livre->setNombrePages(300);
        $livre->setCodeIsbn(9790412882714);
        $livre->setAuteur($auteur);
        dump($livre);
        $entityManager->flush();
   
    
        
        // - modifier le livre dont l'id est `2`
        // - titre : Aperiendum est igitur 
        // - genre : roman d'aventure (id `5`)
        
        $livre = $livreRepository->findAll()[2];
        $livre->setTitre(' Aperiendum est igitur');
        
        $genres = $genreRepository->findAll();
        $genre = $genres[4]->setNom("roman d'aventure");
        $livre->addGenre($genre);

        dump($livre);
        dump($genre);        

// Requêtes de suppression :
// - supprimer le livre dont l'id est `123`

// if($livre)
// {
//             $livre = $livreRepository->find(123);
//             $entityManager->remove($livre);
//             $entityManager->flush();
//         }

 ### Les emprunteurs

// Requêtes de lecture :


// - les données de l'emprunteur dont l'id est `3`
        $emprunteur = $emprunteurRepository->find(3);

// - les données de l'emprunteur qui est relié au user dont l'id est `3`
// - liste complète des emprunteurs
        // $emprunteurs = $emprunteurRepository->findAll();
        // $users = $userRepository->findAll();
        // $user3 = $users[2]; 
        // foreach ($users->getUser() as $emprunteurUser3) {
        //     dump($emprunteurUser3);
        // }

// - la liste des emprunteurs dont le nom ou le prénom contient le mot clé `foo`

// - la liste des emprunteurs dont le téléphone contient le mot clé `1234`

// - la liste des emprunteurs dont la date de création est antérieure au 01/03/2021 exclu (c-à-d strictement plus petit)

// - la liste des emprunteurs inactifs (c-à-d dont l'attribut `actif` est égal à `false`)


        exit();

    }
}
