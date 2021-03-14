<?php

namespace App\Service\Parser;

use App\Entity\Gift;
use App\Entity\Receiver;
use Doctrine\ORM\EntityManagerInterface;

class GiftParser implements ParserInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function parse(array $gifts): void
    {
        foreach ($gifts as $gift) {

            try {
                list($giftUuid, $giftCode, $giftDescription, $giftPrice, $receiverUuid, $receiverFirstName, $receiverLastName, $receiverCountryCode) = $gift;
            } catch (\Exception $exception) {
                throw new \Exception($exception->getMessage(),$exception->getCode());
            }

            $receiver = new Receiver();
            $receiver
                ->setUuid($receiverUuid)
                ->setFirstName($receiverFirstName)
                ->setLastName($receiverLastName)
                ->setCountryCode($receiverCountryCode)
            ;

            $gift = new Gift();
            $gift
                ->setUuid($giftUuid)
                ->setCode($giftCode)
                ->setDescription($giftDescription)
                ->setPrice(floatval($giftPrice))
                ->setReceiver($receiver)
            ;

            $this->entityManager->persist($gift);
        }

        $this->entityManager->flush();
    }
}