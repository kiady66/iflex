<?php

namespace App\Repository;

use App\Entity\MessageRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MessageRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageRoom[]    findAll()
 * @method MessageRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageRoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageRoom::class);
    }

    // /**
    //  * @return MessageRoom[] Returns an array of MessageRoom objects
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
    public function findOneBySomeField($value): ?MessageRoom
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
