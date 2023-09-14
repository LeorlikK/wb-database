<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApiService extends Model
{
    use HasFactory;

    protected $table = 'api_services';
    protected $guarded = [];

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class, 'api_service_id', 'id');
    }
}
