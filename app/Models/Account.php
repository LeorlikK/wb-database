<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $guarded = [];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class, 'account_id',  'id');
    }

    public function tokensForThisApiService(ApiService $apiService): Collection
    {
        return $this->hasMany(Token::class, 'account_id',  'id')
            ->with('type')
            ->where('api_service_id', $apiService->id)->get();
    }
}
