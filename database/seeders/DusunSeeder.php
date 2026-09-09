<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dusun;

class DusunSeeder extends Seeder
{
    public function run(): void
    {
        Dusun::create([
            'nama_dusun' => 'Candi Wetan',
        ]);
    }
}