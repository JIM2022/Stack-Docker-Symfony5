<?php

namespace App\Controller;

use App\Service\StatisticCompilator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GiftStatisticController extends AbstractController
{
    private $statisticCompilator;

    public function __construct(StatisticCompilator $statisticCompilator)
    {
        $this->statisticCompilator = $statisticCompilator;
    }

    /**
     * @Route(
     *     path="/statistics",
     *     name="app_gift_statistic",
     *     methods={"GET"}
     * )
     */
    public function statisticAction(): Response
    {
        return $this->json($this->statisticCompilator->getGiftListStatistic());
    }
}