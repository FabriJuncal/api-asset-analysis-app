<?php

namespace Database\Seeders;

use App\Models\InvestmentPlatform;
use Illuminate\Database\Seeder;

class InvestmentPlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $platformsData = [
            [
                'name' => 'Binance',
                'type' => 'crypto',
                'website' => 'https://www.binance.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/270.png',
            ],
            [
                'name' => 'Coinbase',
                'type' => 'crypto',
                'website' => 'https://exchange.coinbase.com',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/89.png',
            ],
            [
                'name' => 'Bybit',
                'type' => 'crypto',
                'website' => 'https://www.bybit.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/521.png',
            ],
            [
                'name' => 'OKX',
                'type' => 'crypto',
                'website' => 'https://www.okx.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/294.png',
            ],
            [
                'name' => 'Upbit',
                'type' => 'crypto',
                'website' => 'https://upbit.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/351.png',
            ],
            [
                'name' => 'Kraken',
                'type' => 'crypto',
                'website' => 'https://www.kraken.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/24.png',
            ],
            [
                'name' => 'KuCoin',
                'type' => 'crypto',
                'website' => 'https://www.kucoin.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/311.png',
            ],
            [
                'name' => 'Gate.io',
                'type' => 'crypto',
                'website' => 'https://www.gate.io/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/302.png',
            ],
            [
                'name' => 'HTX',
                'type' => 'crypto',
                'website' => 'https://www.htx.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/102.png',
            ],
            [
                'name' => 'Bitfinex',
                'type' => 'crypto',
                'website' => 'https://www.bitfinex.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/37.png',
            ],
            [
                'name' => 'MEXC',
                'type' => 'crypto',
                'website' => 'https://www.mexc.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/544.png',
            ],
            [
                'name' => 'Bitget',
                'type' => 'crypto',
                'website' => 'https://www.bitget.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/513.png',
            ],
            [
                'name' => 'Bitstamp',
                'type' => 'crypto',
                'website' => 'https://www.bitstamp.net/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/70.png'
            ],
            [
                'name' => 'Crypto.com',
                'type' => 'crypto',
                'website' => 'https://crypto.com/exchange/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/1149.png',
            ],
            [
                'name' => 'Gemini',
                'type' => 'crypto',
                'website' => 'https://www.gemini.com/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/151.png'
            ],
            [
                'name' => 'BingX',
                'type' => 'crypto',
                'website' => 'https://bingx.com/en-us/',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/1064.png'
            ],
            [
                'name' => 'XT.COM',
                'type' => 'crypto',
                'website' => 'https://www.xt.com/en',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/525.png'
            ],
            [
                'name' => 'Deepcoin',
                'type' => 'crypto',
                'website' => 'https://www.deepcoin.com/cmc',
                'logo' => 'https://s2.coinmarketcap.com/static/img/exchanges/64x64/1182.png'
            ],
        ];

        foreach ($platformsData as $platformData) {
            InvestmentPlatform::insert([
                'name' => $platformData['name'],
                'type' => $platformData['type'],
                'website' => $platformData['website'],
                'logo' => $platformData['logo']
            ]);
        }
    }
}
