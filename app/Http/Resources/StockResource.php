<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Stock */
class StockResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'stock_name' => $this->stock_name,
            'en_name' => $this->en_name,
            'market' => new MarketResource($this->whenLoaded('market'))
        ];
    }
}
