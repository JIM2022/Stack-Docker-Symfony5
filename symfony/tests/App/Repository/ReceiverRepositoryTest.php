<?php

namespace Tests\App\Repository;

use App\Entity\Receiver;
use App\Repository\ReceiverRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ReceiverRepositoryTest extends KernelTestCase
{
    private $em;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();

    }

    public function testInstantiateRepository()
    {
        $repository = $this->em->getRepository(Receiver::class);

        $this->assertTrue($repository instanceof ReceiverRepository);
    }

    protected function tearDown():void
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null;
    }
}