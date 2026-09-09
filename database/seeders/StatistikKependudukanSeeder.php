<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatistikKependudukan;

class StatistikKependudukanSeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('data/dataset_candi_wetan_2026.csv');

        if (!file_exists($file)) {
            $this->command->error("File CSV tidak ditemukan: " . $file);
            return;
        }

        $handle = fopen($file, 'r');

        if ($handle === false) {
            $this->command->error("Gagal membuka file CSV.");
            return;
        }

        // Ambil baris pertama untuk menentukan delimiter
        $firstLine = fgets($handle);

        if ($firstLine === false) {
            $this->command->error("File CSV kosong.");
            fclose($handle);
            return;
        }

        // Deteksi delimiter otomatis
        $delimiter = substr_count($firstLine, ';') > substr_count($firstLine, ',')
            ? ';'
            : ',';

        // Kembali ke awal file
        rewind($handle);

        // Lewati header
        fgetcsv($handle, 0, $delimiter);

        $jumlahData = 0;

        while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {

            // Lewati baris kosong
            if (count($row) < 7) {
                continue;
            }

            // Lewati jika nama dusun kosong
            if (trim($row[0]) === '') {
                continue;
            }

            StatistikKependudukan::create([
                'dusun'       => trim($row[0]),
                'rt'          => trim($row[1]),
                'rw'          => trim($row[2]),
                'tahun'       => (int) trim($row[3]),
                'kategori'    => trim($row[4]),
                'subkategori' => trim($row[5]),
                'jumlah'      => (int) trim($row[6]),
            ]);

            $jumlahData++;
        }

        fclose($handle);

        $this->command->info(
            "Berhasil mengimpor {$jumlahData} data dari CSV."
        );
    }
}