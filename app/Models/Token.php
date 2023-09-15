<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Token
 *
 * @property int $id
 * @property int $account_id
 * @property int $token_type_id
 * @property string $token
 * @property-read \App\Models\Account $account
 * @property-read \App\Models\TokenType $type
 * @method static \Database\Factories\TokenFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Token newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token query()
 * @method static \Illuminate\Database\Eloquent\Builder|Token tokenForThisAccountApiService(\App\Models\ApiService $apiService, \App\Models\Account $account)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereTokenTypeId($value)
 * @mixin \Eloquent
 */
class Token extends Model
{
    use HasFactory;

    protected $table = 'tokens';
    protected $guarded = [];
    public $timestamps = false;

    public function scopeTokenForThisAccountApiService($query, ApiService $apiService, Account $account)
    {
        $typeId = $apiService->tokenType->id;
        return $query->where('account_id', $account->id)->where('token_type_id', $typeId);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TokenType::class, 'token_type_id', 'id');
    }
}
