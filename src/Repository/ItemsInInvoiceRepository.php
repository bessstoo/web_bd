<?php

namespace App\Repository;

use App\Entity\ItemsInInvoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ItemsInInvoice>
 *
 * @method ItemsInInvoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemsInInvoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemsInInvoice[]    findAll()
 * @method ItemsInInvoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemsInInvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemsInInvoice::class);
    }



//    /**
//     * @return ItemsInInvoice[] Returns an array of ItemsInInvoice objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ItemsInInvoice
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
