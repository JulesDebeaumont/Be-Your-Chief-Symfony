<?php

namespace App\Repository;

use App\Entity\RecipeOrigin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecipeOrigin|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeOrigin|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeOrigin[]    findAll()
 * @method RecipeOrigin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipOriginRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeOrigin::class);
    }

    // /**
    //  * @return RecipOrigin[] Returns an array of RecipOrigin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecipOrigin
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
