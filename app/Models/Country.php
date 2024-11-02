<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $fillable = ['country_name'];

    public function statistic(): HasOne
    {
        return $this->hasOne(statistic::class);
    }
}
