<?php

namespace App\Services;

use App\Contracts\Servicable;
use App\Models\Price;

class WorthService implements Servicable
{

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function update()
    {
    }

    /**
     * Get the total worth for all stocks
     * @return int
     */
    public function calculateTotalWorth(): float
    {
        return Price::groupBy('stock_id')->latest()->sum('price');
    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}
