<?php

namespace App\Repository;

use App\Entity\bon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method bon|null find($id, $lockMode = null, $lockVersion = null)
 * @method bon|null findOneBy(array $criteria, array $orderBy = null)
 * @method bon[]    findAll()
 * @method bon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, bon::class);
    }

    // /**
    //  * @return bon[] Returns an array of bon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?bon
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
