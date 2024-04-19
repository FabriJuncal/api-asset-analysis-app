<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CryptosPairs extends Model
{
    use HasFactory;

    public function crypto1()
    {
        return $this->belongsTo(Cryptos::class, 'crypto_id_1');
    }

    public function crypto2()
    {
        return $this->belongsTo(Cryptos::class, 'crypto_id_2');
    }

    public function investmentPlatform()
    {
        return $this->belongsTo(InvestmentPlatform::class, 'investment_platform_id');
    }

}
