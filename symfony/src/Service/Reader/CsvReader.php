<?php

namespace App\Service\Reader;

class CsvReader implements ReaderInterface
{
    public function read(string $path): array
    {
        $handle = fopen($path, 'r');
        $result = [];

        for ($i = 0; $row = fgetcsv($handle); ++$i) {
            if ($i === 0) {
                $nbColumnsToFill = count(array_keys($row));
                continue;
            }

            if (count(array_keys($row)) < $nbColumnsToFill) {
                foreach ($row as $item) {
                    if ('' !== $item) {
                        $tmpRow[] = $item;
                    }
                }

                if (count(array_keys($tmpRow)) === $nbColumnsToFill) {
                    array_merge($result, $tmpRow);
                    unset($tmpRow);
                }

                continue;
            }

            $result[$i] = $row;
        }
        fclose($handle);

        return $result;
    }
}
