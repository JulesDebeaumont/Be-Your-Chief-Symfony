<?php

namespace App\Repository;

use App\Entity\MerchantSpecification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MerchantSpecification|null find($id, $lockMode = null, $lockVersion = null)
 * @method MerchantSpecification|null findOneBy(array $criteria, array $orderBy = null)
 * @method MerchantSpecification[]    findAll()
 * @method MerchantSpecification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarchantSpecificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MerchantSpecification::class);
    }

    // /**
    //  * @return MarchantSpecification[] Returns an array of MarchantSpecification objects
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
    public function findOneBySomeField($value): ?MarchantSpecification
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
