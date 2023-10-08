<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Http\Resources\PriceCollection;
use App\Models\Price;

class PriceController extends Controller
{
    /**
     * Get all the stock prices now
     * @return PriceCollection
     */
    public function index(): PriceCollection
    {
        // Get all stock prices
        // For optimisation here may have a pagination
        // For now there's a only about 16 stocks items, so it's no needed
        $prices = Price::with(['stock', 'stock.market'])->get();

        return new PriceCollection($prices);
    }
}
