<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function save(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @return Product[] Returns an array of Product objects
     */
    public function findByCategory(array $categories)
    {
        // Si aucune catégorie sélectionnée, renvoyer tous les produits
        if (empty($categories)) {
            return $this->createQueryBuilder('product')
                ->orderBy('product.idProduct', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult();
        } else {
            // Récupérer les produits correspondant aux filtres et sous-filtres sélectionnés
            $qb = $this->createQueryBuilder('product')
                ->where('product.category IN (:categories)')
                ->setParameter('categories', $categories);

            return $qb->orderBy('product.idProduct', 'ASC')
                ->getQuery()
                ->getResult();
        }
    }


    // /**
    // * @return Product[] Returns an array of Product objects
    // */
    // public function getProducts() // On fait remonter toutes les catégories (parents + enfants)
    // {
    //     $products = $this->findByCategory();

    //     $results =[];

    //     foreach ($products as $product)
    //     {
    //         $results[$product->getIdProduct()] = [
    //                                                 "idProduct" => $product->getIdProduct(),
    //                                                 "name" => $product->getName(),
    //                                                 "image" => $product->getPicture(),
    //                                                 "price" => $product->getPrice(),
    //                                                 "category" => $this->findByCategory($product->getCategory())
                                                    
    //         ];     
    //     }
    //     return $results;
    // }











    


//    /**
//     * @return Product[] Returns an array of Product objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Product
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
