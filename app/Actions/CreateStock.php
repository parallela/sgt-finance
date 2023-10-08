<?php

namespace App\Actions;

use App\Data\IndexData;
use App\Models\Stock;

class CreateStock
{
    /**
     * This method will be responsible for
     * create a stock or update if there's existing one
     *
     * If no such stock exists, will create a record by merging the attributes
     * and values into one.
     *
     * @param IndexData $index
     * @return Stock
     */
    public function execute(IndexData $index): Stock
    {
        $stock = Stock::updateOrCreate(
            [
                'stock_name' => $index->stock_name,
                'market_id' => $index->market_id
            ],
            ['en_name' => $index->en_name]
        );

        $stock->prices()->create([
            'price' => $index->price,
            'percentage' => $index->priceMovement->percentage,
            'movement' => $index->priceMovement->movement
        ]);

        return $stock;
    }
}
