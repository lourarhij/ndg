<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(['/', '/home'], 'home', methods : ['GET'])]
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }

    public function boutique(): Response
    {
        return $this->render('shop.html.twig');
    }

    #[Route('/about', name:'about', methods : ['GET'])]
    public function histoire(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route('/faq', name:'faq', methods : ['GET'])]
    public function evenements(): Response
    {
        return $this->render('faq.html.twig');
    }

    #[Route('/program', name:'program', methods : ['GET'])]
    public function fidelite(): Response
    {
        return $this->render('program.html.twig');
    }

    #[Route('/contact', name:'contact', methods : ['GET'])]
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }

    #[Route('/cart', name:'cart', methods : ['GET'])]
    public function cart(): Response
    {
        return $this->render('cart.html.twig');
    }

    #[Route('/payment', name:'payment', methods : ['GET'])]
    public function payment(): Response
    {
        return $this->render('payment.html.twig');
    }

    #[Route('/login', name:'login', methods : ['GET'])]
    public function login(): Response
    {
        return $this->render('loginAndRegistration.html.twig');
    }

    #[Route('/myAccount', name:'myAccount', methods : ['GET'])]
    public function myAccount(): Response
    {
        return $this->render('myAccount.html.twig');
    }
}
