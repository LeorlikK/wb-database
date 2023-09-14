<?php

namespace Database\Factories;

use App\Models\ApiService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApiService>
 */
class ApiServiceFactory extends Factory
{
    protected $model = ApiService::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()
        ];
    }
}
