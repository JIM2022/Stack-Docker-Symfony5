<?php

namespace Tests\App\Repository;

use App\Entity\Gift;
use App\Repository\GiftRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GiftRepositoryTest extends KernelTestCase
{
    private $em;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();

    }

    public function testInstantiateRepository()
    {
        $repository = $this->em->getRepository(Gift::class);

        $this->assertTrue($repository instanceof GiftRepository);
    }

    protected function tearDown():void
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null;
    }
}