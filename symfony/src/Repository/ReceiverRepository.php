<?php

namespace App\Repository;

use App\Entity\Receiver;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReceiverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Receiver::class);
    }

    public function getNumberOfCountries()
    {
        $qb = $this->createQueryBuilder('r');

        return $qb
            ->SELECT('COUNT(DISTINCT r.countryCode) AS nb_countries')
            ->getQuery()
            ->getResult()
        ;
    }
}
