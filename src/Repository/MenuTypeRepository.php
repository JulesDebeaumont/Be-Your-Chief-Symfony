<?php

namespace App\Repository;

use App\Entity\MenuType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuType[]    findAll()
 * @method MenuType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuType::class);
    }

    // /**
    //  * @return MenuTypeFixtures[] Returns an array of MenuTypeFixtures objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MenuTypeFixtures
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
