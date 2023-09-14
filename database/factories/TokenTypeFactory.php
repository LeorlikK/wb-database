<?php

namespace Database\Factories;

use App\Models\TokenType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TokenType>
 */
class TokenTypeFactory extends Factory
{
    protected $model = TokenType::class;

    private static int $countId = 0;
    private static array $name = [
        'bearer',
        'api-key',
        'login and password',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$countId++;

        return [
            'name' => self::$name[self::$countId-1]
        ];
    }
}
