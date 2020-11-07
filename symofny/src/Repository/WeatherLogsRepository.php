<?php

namespace App\Repository;

use App\Entity\WeatherLogs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WeatherLogs|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherLogs|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherLogs[]    findAll()
 * @method WeatherLogs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherLogsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherLogs::class);
    }

    // /**
    //  * @return WeatherLogs[] Returns an array of WeatherLogs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WeatherLogs
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
