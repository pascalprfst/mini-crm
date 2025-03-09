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

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            $data[] = $row;
        }

        fclose($file);

        if ($firstRow) {
            return $data[0];
        }

        return $data;
    }
}
