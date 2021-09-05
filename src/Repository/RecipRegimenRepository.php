<?php

namespace App\Repository;

use App\Entity\RecipeRegimen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecipeRegimen|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeRegimen|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeRegimen[]    findAll()
 * @method RecipeRegimen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipRegimenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeRegimen::class);
    }

    // /**
    //  * @return RecipeRegimenFixtures[] Returns an array of RecipeRegimenFixtures objects
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
    public function findOneBySomeField($value): ?RecipeRegimenFixtures
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
