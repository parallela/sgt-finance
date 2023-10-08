<?php

namespace App\Http\Translators;

use App\Contracts\Translatable;
use App\Data\IndexData;
use App\Data\IndexPriceMovementData;
use App\Enums\IndexMovement;
use App\Models\Market;
use Illuminate\Support\Collection;

/**
 * This translator will be responsible for transforming the response that comes from
 * Serp to Plain Laravel Collection
 */
final class SerpIndexResponseTranslator implements Translatable
{
    public static function translate(array $response): Collection
    {
        // Save allowed regions into cache for the cycle of the request
        $allowedRegions = blink()->once(
            'allowed_markets',
            fn() => Market::all()
        );

        // Get all markets regions and stocks into them
        $markets = collect($response['markets']);

        // Filter to only allowed regions for stocks
        $regions = $markets
            ->keys()
            ->filter(
                fn(string $key) => in_array(
                    $key,
                    $allowedRegions->pluck('state')->toArray()
                )
            );

        $stocks = collect();
        // The keys of market stocks are the regions
        foreach ($regions as $region) {
            $stocksFromMarket = collect($markets[$region]);

            // Merge all region stocks
            // into one stocks collection data object based on market_id
            $stocks = $stocks->merge(
                $stocksFromMarket->map(
                    fn(array $stock) => new IndexData(
                        $stock['stock'],
                        $stock['name'],
                        $stock['price'],
                        $allowedRegions->where('state', $region)->first()?->id,
                        new IndexPriceMovementData(
                            $stock['price_movement']['percentage'],
                            $stock['price_movement']['value'],
                            IndexMovement::from(
                                $stock['price_movement']['movement']
                            )
                        )
                    )
                )
            );
        }

        return $stocks;
    }
}
