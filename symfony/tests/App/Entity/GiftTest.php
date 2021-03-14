<?php

namespace Tests\App\Entity;

use App\Entity\Gift;
use App\Entity\Receiver;
use PHPUnit\Framework\TestCase;

class GiftTest extends TestCase
{
    public function testGiftSettersAndGetters()
    {
        $receiver = new Receiver();
        $receiver
            ->setUuid('0426bba2-23b1-424d-875b-a466a435996e')
            ->setFirstName('plip')
            ->setLastName('plop')
            ->setCountryCode('CM')
        ;

        $gift = new Gift();
        $gift
            ->setUuid('ea9923fd-14b2-4131-9c4b-f86f45567ed5')
            ->setCode('game')
            ->setDescription('test')
            ->setPrice(floatval('15'))
            ->setReceiver($receiver)
        ;

        $this->assertNull($gift->getId());
        $this->assertEquals('ea9923fd-14b2-4131-9c4b-f86f45567ed5', $gift->getUuid());
        $this->assertEquals('game', $gift->getCode());
        $this->assertEquals('test', $gift->getDescription());
        $this->assertEquals(15, $gift->getPrice());
        $this->assertEquals($receiver, $gift->getReceiver());
    }
}