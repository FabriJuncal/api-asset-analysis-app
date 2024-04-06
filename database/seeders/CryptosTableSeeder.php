<?php

namespace Database\Seeders;

use App\Models\Cryptos;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cryptos::firstOrCreate([
            'name' => 'Bitcoin',
            'symbol' => 'BTC',
            'slug' => 'bitcoin',
            'description' => 'Bitcoin (BTC) is a consensus network that enables a new payment system and a completely digital currency. Powered by its users, it is a peer to peer payment network that requires no central authority to operate. On October 31st, 2008, an individual or group of individuals operating under the pseudonym "Satoshi Nakamoto" published the Bitcoin Whitepaper and described it as: "a purely peer-to-peer version of electronic cash would allow online payments to be sent directly from one party to another without going through a financial institution."',
            'website' => 'https://bitcoin.org/',
            'technical_doc' => 'https://bitcoin.org/bitcoin.pdf',
            'source_code' => 'https://github.com/bitcoin/',
            'logo' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/1.png',
        ]);

        Cryptos::firstOrCreate([
            'name' => 'Ethereum',
            'symbol' => 'ETH',
            'slug' => 'ethereum',
            'description' => 'Ethereum (ETH) is a smart contract platform that enables developers to build decentralized applications (dapps) conceptualized by Vitalik Buterin in 2013. ETH is the native currency for the Ethereum platform and also works as the transaction fees to miners on the Ethereum network.

            Ethereum is the pioneer for blockchain based smart contracts. When running on the blockchain a smart contract becomes like a self-operating computer program that automatically executes when specific conditions are met. On the blockchain, smart contracts allow for code to be run exactly as programmed without any possibility of downtime, censorship, fraud or third-party interference. It can facilitate the exchange of money, content, property, shares, or anything of value. The Ethereum network went live on July 30th, 2015 with 72 million Ethereum premined.',
            'website' => 'https://www.ethereum.org/',
            'technical_doc' => 'https://github.com/ethereum/wiki/wiki/White-Paper',
            'source_code' => 'https://github.com/ethereum',
            'logo' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png',
        ]);
    }
}
