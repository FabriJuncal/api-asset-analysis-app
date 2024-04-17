<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPlatform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'website',
        'logo'
    ];
}
