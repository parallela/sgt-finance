<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    public function run(): void
    {
        Market::factory()->createMany([
            [
                'state' => 'europe'
            ],
            [
                'state' => 'asia'
            ],
            [
                'state' => 'us'
            ]
        ]);
    }
}
