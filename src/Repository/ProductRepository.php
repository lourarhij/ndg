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
    public function findByCategory($category = null): array
    {
        if ($category === null || $category === "") {
            return $this->createQueryBuilder('product')
                ->where('product.category IS NULL') // On suppose que NULL représente les produits sans catégorie parent
                ->orderBy('product.idProduct', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult();
        } else {
            return $this->createQueryBuilder('product')
                ->where('product.category = :category')
                ->setParameter('category', $category)
                ->orderBy('product.idProduct', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult();
        }
    }


    /**
    * @return Product[] Returns an array of Product objects
    */
    public function getProducts() // On fait remonter toutes les catégories (parents + enfants)
    {
        $category = 42;
        $products = $this->findByCategory($category);

        $results =[];

        foreach ($products as $product)
        {
            $results[$product->getIdProduct()] = [
                                                    "idProduct" => $product->getIdProduct(),
                                                    "name" => $product->getName()
                                                    
            ];     
        }
        return $results;
    }











    


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
