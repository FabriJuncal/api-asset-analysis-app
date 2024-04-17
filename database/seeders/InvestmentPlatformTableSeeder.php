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
                'logo' => 'https://www.binance.com/en/static/latest/img/binance-logo.svg',
            ],
            [
                'name' => 'Coinbase',
                'type' => 'crypto',
                'website' => 'https://www.coinbase.com/',
                'logo' => 'https://www.coinbase.com/en/logo',
            ],
            [
                'name' => 'Kraken',
                'type' => 'crypto',
                'website' => 'https://www.kraken.com/',
                'logo' => 'https://www.kraken.com/assets/1648730481/kraken-logo.svg',
            ],
            [
                'name' => 'eToro',
                'type' => 'crypto',
                'website' => 'https://www.etoro.com/',
                'logo' => 'https://www.etoro.com/en-us/static/common/images/logo.svg',
            ],
            [
                'name' => 'FTX',
                'type' => 'crypto',
                'website' => 'https://ftx.com/',
                'logo' => 'https://ftx.com/static/media/logo.svg',
            ],
            [
                'name' => 'Huobi Global',
                'type' => 'crypto',
                'website' => 'https://www.huobi.com/en/',
                'logo' => 'https://www.huobi.com/static/img/nav/logo.png',
            ],
            [
                'name' => 'OKX',
                'type' => 'crypto',
                'website' => 'https://www.okx.com/',
                'logo' => 'https://www.okx.com/static/imgs/okx-logo.svg',
            ],
            [
                'name' => 'Bybit',
                'type' => 'crypto',
                'website' => 'https://www.bybit.com/',
                'logo' => 'https://www.bybit.com/static/img/logo.svg',
            ],
            [
                'name' => 'Crypto.com',
                'type' => 'crypto',
                'website' => 'https://crypto.com/',
                'logo' => 'https://crypto.com/static/image/usdc_swap/logo_crypto-com.svg',
            ],
            [
                'name' => 'Bitfinex',
                'type' => 'crypto',
                'website' => 'https://www.bitfinex.com/',
                'logo' => 'https://www.bitfinex.com/assets/img/logo.svg',
            ],
            [
                'name' => 'Gate.io',
                'type' => 'crypto',
                'website' => 'https://www.gate.io/',
                'logo' => 'https://www.gate.io/images/logo.svg',
            ],
            [
                'name' => 'KuCoin',
                'type' => 'crypto',
                'website' => 'https://www.kucoin.com/',
                'logo' => 'https://www.kucoin.com/static/img/logo.png',
            ],
            [
                'name' => 'Bittrex',
                'type' => 'crypto',
                'website' => 'https://www.bittrex.com/',
                'logo' => 'https://bittrex.com/static/img/logonew.svg'
            ],
            [
                'name' => 'Poloniex',
                'type' => 'crypto',
                'website' => 'https://poloniex.com/',
                'logo' => 'https://poloniex.com/img/poloniex.svg'
            ],
            [
                'name' => 'HitBTC',
                'type' => 'crypto',
                'website' => 'https://hitbtc.com/',
                'logo' => 'https://hitbtc.com/images/logo.svg'
            ],
            [
                'name' => 'Bitstamp',
                'type' => 'crypto',
                'website' => 'https://www.bitstamp.net/',
                'logo' => 'https://www.bitstamp.net/img/logos/bitstamp-logo-black.svg'
            ],
            [
                'name' => 'Gemini',
                'type' => 'crypto',
                'website' => 'https://www.gemini.com/',
                'logo' => 'https://www.gemini.com/static/logos/gemini-logo.svg'
            ],
            [
                'name' => 'BMEX',
                'type' => 'derivatives',
                'website' => 'https://bmex.com/',
                'logo' => 'https://bmex.com/images/bmex_logo_white.svg'
            ],
            [
                'name' => 'Deribit',
                'type' => 'derivatives',
                'website' => 'https://deribit.com/',
                'logo' => 'https://deribit.com/images/deribit-logo.svg'
            ],
            [
                'name' => 'BitFlyer',
                'type' => 'crypto',
                'website' => 'https://bitflyer.com/en/',
                'logo' => 'https://bitflyer.com/en/assets/images/logo.svg'
            ],
            [
                'name' => 'Liquid',
                'type' => 'crypto',
                'website' => 'https://liquid.com/',
                'logo' => 'https://liquid.com/assets/img/logo_white.svg'
            ],
            [
                'name' => 'Bakkt',
                'type' => 'digital assets',
                'website' => 'https://bakkt.com/',
                'logo' => 'https://bakkt.com/wp-content/uploads/2021/06/bakkt-logo-white.svg'
            ]
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
