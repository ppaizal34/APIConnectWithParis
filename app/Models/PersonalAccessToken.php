<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends Model
{
    protected $table = 'personal_access_tokens';

    public function tokenable()
    {
        return $this->morphTo();
    }
}
