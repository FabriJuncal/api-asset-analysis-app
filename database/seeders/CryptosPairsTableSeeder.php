<?php

namespace Database\Seeders;

use App\Models\Cryptos;
use App\Models\CryptosPairs;
use App\Models\InvestmentPlatform;
use Illuminate\Database\Seeder;

class CryptosPairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cryptos = Cryptos::all();
        $platforms = InvestmentPlatform::all();

        $cryptoPairsData = [];
        foreach ($platforms as $platform) {
            foreach ($cryptos as $crypto1) {
                foreach ($cryptos as $crypto2) {
                    if($crypto1->id != $crypto2->id){
                        $cryptoPairsData[] = [
                            'crypto_id_1' => $crypto1->id,
                            'crypto_id_2' => $crypto2->id,
                            'investment_platform_id' => $platform->id,
                        ];
                    }
                }
            }
        }

        CryptosPairs::insert($cryptoPairsData);
    }
}
