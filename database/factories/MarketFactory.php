<?php

namespace Database\Factories;

use App\Models\Market;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MarketFactory extends Factory
{
    protected $model = Market::class;

    public function definition(): array
    {
        return [
            'state' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
