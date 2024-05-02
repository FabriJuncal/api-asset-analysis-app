<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'slug',
        'description',
        'website',
        'technical_doc',
        'source_code',
        'logo'
    ];

    public function cryptoTags()
    {
        return $this->hasMany(CryptosTags::class, 'crypto_id');
    }

    public function setCreatedAtAttribute($value){
        // date_default_timezone_set("America/Lima"); // Esta configuración afecta a toda la aplicación
        $this->attributes['created_at'] = Carbon::now('America/Argentina/Buenos_Aires'); // Esta configuración solo afecta a esta perte del código
    }

    public function setUpdateAtAttribute($value){
        // date_default_timezone_set("America/Lima"); // Esta configuración afecta a toda la aplicación
        $this->attributes['updated_at'] = Carbon::now('America/Argentina/Buenos_Aires'); // Esta configuración solo afecta a esta perte del código
    }
}
