<?php

namespace Database\Seeders;

use App\Models\Cryptos;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class CryptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $apiKey = '5ab25359-44d5-443f-8b7c-7856e95e34ee';

        $client = new Client();
        $response = $client->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?limit=3', [
            'headers' => [
                'X-CMC_PRO_API_KEY' => $apiKey,
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        $cryptos = [];
        foreach ($data['data'] as $cryptoData) {
            $cryptoID = strval($cryptoData['id']);

            $response = $client->get('https://pro-api.coinmarketcap.com/v2/cryptocurrency/info?id='. $cryptoID, [
                'headers' => [
                  'X-CMC_PRO_API_KEY' => $apiKey,
                ]
              ]);

            $metaData = json_decode($response->getBody()->getContents(), true);
            $metaData = $metaData['data'][$cryptoID];

            Cryptos::firstOrCreate([
                'name' => $metaData['name'],
                'symbol' => $metaData['symbol'],
                'slug' => $metaData['slug'],
                'description' => $metaData['description'],
                'website' => $metaData['urls']['website'][0],
                'technical_doc' => isset($metaData['urls']['technical_doc'][0]) ? $metaData['urls']['technical_doc'][0] : null,
                'source_code' => isset($metaData['urls']['source_code'][0]) ? $metaData['urls']['source_code'][0] : null,
                'logo' => $metaData['logo'],
            ]);
        }
    }
}
