<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Attribute\Template;
use App\Entity\Product;


class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $products = $entityManager->getRepository(Product::class)->findAll();
        return $this->render('shop.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    #[Route('/shop', name:'shop', methods : ['GET'])]
    #[Template("shop.html.twig")]
    public function show(EntityManagerInterface $entityManager)
    {
        //On récupère les catégories enfants du parent
        $filters = $entityManager->getRepository(Category::class)->getCategories();

        //On récupère les produits
        $products = $entityManager->getRepository(Product::class)->getProducts();
        
        return ['filters' => $filters,
                'products' => $products] ;
    }


    
        // #[Route('/produit', name: 'app_produit')]
    // public function index(EntityManagerInterface $entityManager): Response
    // {
    //     $products = $entityManager->getRepository(Product::class)->findAll();
    //     return $this->render('shop.html.twig', [
    //         'controller_name' => 'ProduitController',
    //     ]);
    // }

    // #[Route('/shop', name:'shop', methods : ['GET'])]
    // #[Template("shop.html.twig")]
    // public function show(EntityManagerInterface $entityManager)
    // {
    //     $filters = $entityManager->getRepository(Category::class)->getCategories(); // on récupère les catégories enfants du parent
    //     $products = $entityManager->getRepository(Product::class)->getCategories(); // on récupère les catégories enfants du parent

    //     return ['filters' => $filters] ;
    // }








    // #[Route('/shop', name:'shop', methods : ['GET'])]
    // #[Template("shop.html.twig")]
    // public function show(EntityManagerInterface $entityManager)
    // {
    //     $filters = $entityManager->getRepository(Category::class)->findByIdParent();
        
    //     $subFilters = $entityManager->getRepository(Category::class)->findByIdParent(); //finaliser cette ligne pour afficher les sous filtres qui ont un id parent non nul
        

    //     afficherCategories($entityManager);


    //     return[
    //             'filters' => $filters,
    //             'subFilters' => $subFilters,
    //     ];
        
    //     // $product = $entityManager->getRepository(Product::class)->find($id);
    //     // if (!$product) {
    //     //     throw $this->createNotFoundException(
    //     //         'Aucun produit trouvé pour l\'id '.$id
    //     //     );
    //     // }
    //     // else {

    //     // }

    //     // return new Response('Check out this great product: '.$product->getName());

    //     // or render a template
    //     // in the template, print things with {{ product.name }}
    //     // return $this->render('product/show.html.twig', ['product' => $product]);
    // }
}
