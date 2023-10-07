<?php

namespace App\Http\Translators;

use App\Contracts\Translatable;
use Illuminate\Support\Collection;

/**
 * This translator will be responsible for transforming the response that comes from
 * Serp to Plain Laravel Collection
 */
final class SerpIndexResponseTranslator implements Translatable
{
    public static function translate(array $response): Collection
    {
        dd($response);
    }
}
