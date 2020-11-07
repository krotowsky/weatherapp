<?php

namespace App\Repository;

use App\Entity\WeatherLogs;
use DateInterval;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WeatherLogs|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherLogs|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherLogs[]    findAll()
 * @method WeatherLogs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherLogsRepository extends ServiceEntityRepository
{
//    public function __construct(ManagerRegistry $registry)
//    {
//        parent::__construct($registry, WeatherLogs::class);
//    }

    private $manager;

    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager){
        parent::__construct($registry, WeatherLogs::class);
        $this->manager = $manager;
    }

    public function save($type,$data){
        $dateTime = new \DateTime('now');
        $dateTime->sub(new DateInterval('PT1H'));
        $NewLog =new WeatherLogs();
        switch ($type) {
            case "temp":
                $NewLog->setTemperatureC($data);
                break;
            case "hum":
                $NewLog->setHumidity($data);
                break;
            case "press":
                $NewLog->setAtmosphericPressure($data);
                break;
        }
        $NewLog->setTimestamp($dateTime);
        $this->manager->persist($NewLog);
        $this->manager->flush();
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
