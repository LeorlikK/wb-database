<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    use HasFactory;

    protected $table = 'tokens';
    protected $guarded = [];

    public function scopeMoreThanCurrentId($query, ?int $id)
    {
        $id = $id ?? 0;
        return $query->with('type')->where('id', '>', $id);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TokenType::class, 'token_type_id', 'id');
    }

    public function apiService(): BelongsTo
    {
        return $this->belongsTo(ApiService::class, 'api_service_id', 'id');
    }
}
