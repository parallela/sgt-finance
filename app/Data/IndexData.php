<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class IndexData extends Data
{
    public function __construct(
        public string $stock,
        public string $name,
        public float $price,
        public IndexPriceMovementData $priceMovement
    ) {
    }
}
