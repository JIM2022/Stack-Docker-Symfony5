<?php

namespace Tests\App\Service\Reader;

use App\Service\Reader\CsvReader;
use PHPUnit\Framework\TestCase;

class CsvReaderTest extends TestCase
{
    public function testReadFunctionWithValidFile()
    {
        $fileTestPath = __DIR__ . '/fileTest.txt';

        $csvReader = new CsvReader();
        $giftListTest = $csvReader->read($fileTestPath);

        $content = [
            [
                '0' => 'da0d6adb-6ace-4a5c-8eda-50c4d72b7468',
                '1' => 'car',
                '2' => '(╯°□°）╯︵ ┻━┻)  ',
                '3' => '90.45',
                '4' => 'dd49d9ac-5cd3-49b0-8dbe-ea09e18f8c9d',
                '5' => 'Marie-ève',
                '6' => 'Hearfield',
                '7' => 'CN',
            ],
            [
                '0' => 'b6309db8-f057-4193-8712-8c655c8ce08f',
                '1' => 'sport',
                '2' => 'åß∂ƒ©˙∆˚¬…æ',
                '3' => '24.15',
                '4' => '15d9f4c7-ccab-4716-83fb-b4d90a34c4d1',
                '5' => 'Mélys',
                '6' => 'Lincey',
                '7' => 'CA',
            ]
        ];

        $this->assertEquals(array_values($content), array_values($giftListTest));
    }
}