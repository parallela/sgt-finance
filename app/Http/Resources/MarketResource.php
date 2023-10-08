<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Market */
class MarketResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'state' => $this->state,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
