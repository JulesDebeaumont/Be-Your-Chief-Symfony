<?php

namespace App\Repository;

use App\Entity\IngredientSort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IngredientSort|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngredientSort|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngredientSort[]    findAll()
 * @method IngredientSort[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngredientSort::class);
    }

    // /**
    //  * @return IngredientSort[] Returns an array of IngredientSort objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IngredientSort
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
