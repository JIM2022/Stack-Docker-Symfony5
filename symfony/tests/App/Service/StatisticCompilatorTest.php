<?php

namespace App\Tests\App\Service;

use App\Entity\Gift;
use App\Entity\Receiver;
use App\Service\StatisticCompilator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class StatisticCompilatorTest extends KernelTestCase
{
    private $em;
    private $giftRepository;
    private $receiverRepository;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();

         $this->giftRepository = $this->em->getRepository(Gift::class);
         $this->receiverRepository = $this->em->getRepository(Receiver::class);
    }

    public function testTheReturnWithValidData()
    {
        $content = [
            'nb_gifts' => 988,
            'min_price' => '0',
            'max_price' => '99',
            'avg_price' => '48.4403',
            'nb_countries' => 117,
        ];

        $compilator = new StatisticCompilator($this->giftRepository, $this->receiverRepository);

        $result = $compilator->getGiftListStatistic();
        $this->assertEquals($content, $result);
    }
}