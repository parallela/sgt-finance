<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface Translatable
{
    public static function translate(array $response): Collection;
}
