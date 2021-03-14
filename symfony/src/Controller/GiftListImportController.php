<?php

namespace App\Controller;

use App\Service\StatisticCompilator;
use App\Service\Parser\GiftParser;
use App\Service\Reader\CsvReader;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GiftListImportController extends AbstractController
{
    /**
     * @Route(
     *     path="/import",
     *     name="app_gift_list_import",
     *     methods={"POST"}
     * )
     */
    public function import
    (
        Request $request,
        CsvReader $csvReader,
        GiftParser $giftParser,
        StatisticCompilator $statisticCompilator
    ): Response
    {
        $file = $request->files->get('file');

        if (null === $file) {
            throw new FileException();
        }

        $formattedGiftList = $csvReader->read($file->getRealPath());
        $giftParser->parse($formattedGiftList);

        return $this->json($statisticCompilator->getGiftListStatistic());
    }
}
