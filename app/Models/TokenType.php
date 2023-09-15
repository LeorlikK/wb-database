<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\TokenType
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ApiService> $apiServices
 * @property-read int|null $api_services_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\TokenTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TokenType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenType whereName($value)
 * @mixin \Eloquent
 */
class TokenType extends Model
{
    use HasFactory;

    protected $table = 'token_types';
    protected $guarded = [];
    public $timestamps = false;

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class, 'token_type_id',  'id');
    }

    public function apiServices(): HasMany
    {
        return $this->hasMany(ApiService::class, 'token_types_id',  'id');
    }
}
