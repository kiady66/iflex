<?php

namespace App\Repository;

use App\Entity\UserInvoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserInvoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserInvoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserInvoice[]    findAll()
 * @method UserInvoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserInvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserInvoice::class);
    }

    // /**
    //  * @return UserInvoice[] Returns an array of UserInvoice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserInvoice
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
