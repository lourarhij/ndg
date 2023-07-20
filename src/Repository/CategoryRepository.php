<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

use function PHPUnit\Framework\isNull;

/**
 * @extends ServiceEntityRepository<Category>
 *
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function save(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


   /**
    * @return Category[] Returns an array of Category objects
    */
    public function findByIdParent($value = ""): array
    {
        if($value === NULL OR $value === ""){
            return $this->createQueryBuilder('category') //ici le nom de la category
                ->where('category.idParent IS NULL')
                ->orderBy('category.idCategory', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
    
        } else {
            return $this->createQueryBuilder('category') //ici le nom de la category
                ->where('category.idParent = :idParent')
                ->setParameter('idParent', $value)
                ->orderBy('category.idCategory', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
        }
    }

    /**
    * @return Category[] Returns an array of Category objects
    */
    public function getCategories() // on fait remonter toutes les catégories (parents + enfants)
    {
        //$categories = $entityManager->getRepository(Category::class)->findByIdParent(); // on récupère les catégories enfants du parent
        $categories= $this->findByIdParent();

        $results =[];

        foreach ($categories as $category)
        {
            $results[$category->getIdCategory()] = [
                                                    "idCategory" => $category->getIdCategory(),
                                                    "name" => $category->getName(),
                                                    "childCategory" => $this->findByIdParent($category->getIdCategory())
                                                    
            ];     
        }
        return $results;
    }









//    /**
//     * @return Category[] Returns an array of Category objects
//     */
//     public function findByIdParent($value = ""): array
//     {
//      if($value === NULL OR $value === ""){
//          return $this->createQueryBuilder('category') //ici le nom de la category
//             ->where('category.idParent IS NULL')
//             ->orderBy('category.idCategory', 'ASC')
//             ->setMaxResults(10)
//             ->getQuery()
//             ->getResult()
//         ;
 
//      } else {
//          return $this->createQueryBuilder('category') //ici le nom de la category
//             ->where('category.idParent = :idParent')
//             ->setParameter('idParent', $value)
//             ->orderBy('category.idCategory', 'ASC')
//             ->setMaxResults(10)
//             ->getQuery()
//             ->getResult()
//         ;
//     }
}
















//    /**
//     * @return Category[] Returns an array of Category objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Category
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }