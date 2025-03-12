<?php

namespace App\Services;

class CsvService
{

    /**
     * Reads a CSV and returns its content as an array.
     *
     * @param string $filePath
     * @param bool $firstRow
     * @return array
     */
    public static function getData(string $filePath, bool $firstRow = false): array
    {
        $file = fopen($filePath, "r");

        $data = [];

        while (($line = fgets($file)) !== false) {
            $row = str_getcsv($line, (str_contains($line, ';') ? ';' : ','));
            $data[] = $row;
        }

        fclose($file);

        if ($firstRow) {
            return $data[0];
        }

        return $data;
    }
}
