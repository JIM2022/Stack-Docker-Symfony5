<?php

namespace App\Repository;

use App\Entity\Gift;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GiftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gift::class);
    }

    public function getStatistics()
    {
        $qb = $this->createQueryBuilder('g');

        return $qb
            ->select(
                'COUNT(g.id) AS nb_gifts, 
                MIN(g.price) AS min_price, 
                MAX(g.price) AS max_price, 
                AVG(g.price) AS avg_price'
            )
            ->getQuery()
            ->getResult()
        ;
    }
}
