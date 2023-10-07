<?php

namespace App\Data;

use App\Enums\IndexMovement;
use Spatie\LaravelData\Data;

class IndexPriceMovementData extends Data
{
    public function __construct(
        public float $percentage,
        public float $value,
        public IndexMovement $movement
    ) {
    }
}
