<?php

namespace App\Repository;

use App\Entity\MerchantType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MerchantType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MerchantType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MerchantType[]    findAll()
 * @method MerchantType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MerchantTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MerchantType::class);
    }

    // /**
    //  * @return MerchantType[] Returns an array of MerchantType objects
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
    public function findOneBySomeField($value): ?MerchantType
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
