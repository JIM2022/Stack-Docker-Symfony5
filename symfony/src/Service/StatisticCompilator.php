<?php

namespace App\Service;

use App\Repository\GiftRepository;
use App\Repository\ReceiverRepository;

class StatisticCompilator
{
    private $giftRepository;
    private $receiverRepository;

    public function __construct(GiftRepository $giftRepository, ReceiverRepository $receiverRepository)
    {
        $this->giftRepository = $giftRepository;
        $this->receiverRepository = $receiverRepository;
    }

    public function getGiftListStatistic(): array
    {
        $giftStatistics = $this->giftRepository->getStatistics();
        $receiverStatistics = $this->receiverRepository->getNumberOfCountries();

        return array_replace(current($giftStatistics), current($receiverStatistics));
    }
}
