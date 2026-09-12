<?php

namespace App\Services;

use Illuminate\Support\Collection;

class StatistikKependudukanService
{
    private string $file;

    public function __construct()
    {
        $this->file = database_path('data/dataset_candi_wetan_2026.csv');
    }

    public function all(): Collection
    {
        if (!file_exists($this->file)) {
            return collect();
        }

        $handle = fopen($this->file, 'r');

        if ($handle === false) {
            return collect();
        }

        $headers = fgetcsv($handle, 0, ',', '"', '');

        if ($headers !== false && isset($headers[0])) {
            $headers[0] = preg_replace('/^\xEF\xBB\xBF/', '', $headers[0]);
        }

        $rows = collect();

        while (($row = fgetcsv($handle, 0, ',', '"', '')) !== false) {
            if (count($row) === count($headers)) {
                $rows->push(
                    (object) array_combine($headers, $row)
                );
            }
        }

        fclose($handle);

        return $rows;
    }
}