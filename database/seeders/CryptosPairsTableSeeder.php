<?php

namespace Database\Seeders;

use App\Models\CryptosPairs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptosPairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CryptosPairs::firstOrCreate([
            "crypto_id_1" => 1,
            "crypto_id_2" => 2
        ]);

        CryptosPairs::firstOrCreate([
            "crypto_id_1" => 2,
            "crypto_id_2" => 1
        ]);
    }
}
