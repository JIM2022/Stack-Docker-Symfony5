<?php

namespace Tests\App\Entity;

use App\Entity\Receiver;
use PHPUnit\Framework\TestCase;

class ReceiverTest extends TestCase
{
    public function testReceiverSettersAndGetters()
    {
        $receiver = new Receiver();
        $receiver
            ->setUuid('0426bba2-23b1-424d-875b-a466a435996e')
            ->setFirstName('plip')
            ->setLastName('plop')
            ->setCountryCode('CM')
        ;

        $this->assertNull($receiver->getId());
        $this->assertEquals('0426bba2-23b1-424d-875b-a466a435996e', $receiver->getUuid());
        $this->assertEquals('plip', $receiver->getFirstName());
        $this->assertEquals('plop', $receiver->getLastName());
        $this->assertEquals('CM', $receiver->getCountryCode());
    }
}