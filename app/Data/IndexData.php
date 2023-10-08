<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class IndexData extends Data
{
    public function __construct(
        public string $stock_name,
        public string $en_name,
        public float $price,
        public int $market_id,
        public IndexPriceMovementData $priceMovement
    ) {
    }
}
