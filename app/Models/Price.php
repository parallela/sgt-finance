<?php

namespace App\Models;

use App\Enums\IndexMovement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    /**
     * Cast movement column to enum
     *
     * @var string[]
     */
    public $casts = [
        'movement' => IndexMovement::class
    ];

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}
