<?php

namespace App\Services;

class CsvService
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Reads a CSV and returns its content as an array.
     * @return array
     */
    public function read(): array
    {
        $file = fopen($this->filePath, "r");

        $data = [];

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            $data[] = $row;
        }

        fclose($file);

        return $data;
    }
}
