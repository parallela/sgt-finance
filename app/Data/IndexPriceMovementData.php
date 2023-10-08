<?php

namespace App\Data;

use App\Enums\IndexMovement;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class IndexPriceMovementData extends Data
{
    // cast movement into enum
    public function __construct(
        public float $percentage,
        public float $value,
        #[WithCast(IndexMovement::class)] public IndexMovement $movement
    ) {
    }
}
