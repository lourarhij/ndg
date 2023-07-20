<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Attribute\Template;
use App\Entity\MembersAccount;

class MembersAccountController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $email = $entityManager->getRepository(MembersAccount::class)->get('email');
        $password = $entityManager->getRepository(MembersAccount::class)->get('password');

        // Recherche de l'utilisateur dans la base de données
        $members = $entityManager->getRepository(MembersAccount::class)->findOneBy(['email' => $email]);

        if (!$members) {
            // Le compte n'existe pas
            // Gérez les erreurs ou renvoyez un message à l'utilisateur
            return $this->redirectToRoute('login'); // Redirige vers la page de connexion avec un message d'erreur
        }

        // Vérification du mot de passe
        if (!password_verify($password, $members->getPassword())) {
            // Le mot de passe est incorrect
            // Gérez les erreurs ou renvoyez un message à l'utilisateur

            return $this->redirectToRoute('login'); // Redirige vers la page de connexion avec un message d'erreur
        }

        // Le compte existe et le mot de passe est correct
        // Effectuez les actions nécessaires, par exemple, définissez la session utilisateur

        return $this->redirectToRoute('myAccount'); // Redirige vers la page mon compte
    }
}

