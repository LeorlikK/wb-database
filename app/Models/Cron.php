<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cron extends Model
{
    use HasFactory;

    protected $table = 'cron';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'string'
    ];

    public function scopeLastFinished($query, $tableName)
    {
        return $query->where('table_name', $tableName)->latest();
    }

    public function getMinusOneDayAttribute(): string
    {
        return Carbon::parse($this->created_at)->subDay()->format('Y-m-d');
    }

    public static function getFromAndToTime($tableName): array
    {
        $firstTimeStart = '2000-01-01';
        $firstTimeFinish = '2030-01-01';
        $yesterday = Cron::query()->lastFinished($tableName)->first()?->minusOneDay ?? $firstTimeStart;
        $today = $yesterday === $firstTimeStart ? $firstTimeFinish : $yesterday;

        return [
            'yesterday' => $yesterday,
            'today' => $today
        ];
    }
}
