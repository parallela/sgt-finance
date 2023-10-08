<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Blink\Blink;

class Stock extends Model
{
    use HasFactory;

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    public function latestPrice(): void
    {
        $this->hasOne(Price::class)->orderBy('created_at', 'desc');
    }

    /**
     * If we want to use somewhere the base price
     * of this stock, we use Laravel Blink which will store the basePrice() value
     * in one request cycle, so we can use it without making multiple db requests
     * @return array|mixed|string|null
     */
    public function basePrice(): mixed
    {
        return blink()->once(
            'stock_base_price' . $this->id,
            fn() => $this->prices()
                ->orderBy('created_at')
                ->first()
        );
    }
}
