<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ApiService
 *
 * @property int $id
 * @property int $token_types_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TokenType $tokenType
 * @method static \Database\Factories\ApiServiceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService whereTokenTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApiService extends Model
{
    use HasFactory;

    protected $table = 'api_services';
    protected $guarded = [];

    public function tokenType(): BelongsTo
    {
        return $this->belongsTo(TokenType::class, 'token_types_id', 'id');
    }
}
