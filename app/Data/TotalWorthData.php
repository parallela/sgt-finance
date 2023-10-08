<?php

namespace App\Data;

use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class TotalWorthData extends Data
{
    // Get total worth data with cast time
    public function __construct(
        #[WithCast(DateTimeInterfaceCast::class)] public DateTime $time,
        public string $value
    ) {
    }
}
