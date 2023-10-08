<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Http\Resources\StockCollection;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Get all the stock prices now
     * @return StockCollection
     */
    public function index(): StockCollection
    {
        // Get all stock prices
        // For optimisation here may have a pagination
        // For now there's an only about 16 stocks items, so it's no needed
        $stocks = Stock::with(['market', 'latestPrice'])->get();

        return new StockCollection($stocks);
    }
}
