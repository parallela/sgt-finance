<?php

namespace App\Pipelines;

use App\Actions\CreateStock;
use App\Data\IndexData;
use Closure;
use Illuminate\Support\Collection;

/**
 * This pipeline will be responsible for storing the scrapped information
 * into the database via dispatching the job for inserting
 */
class StoreIndexesPipeline
{
    /**
     * @param array $response
     * @param Closure $next
     * @return mixed
     */
    public function handle(Collection $translatedResponse, Closure $next): mixed
    {
        // Store the data into the stocks table
        $translatedResponse->map(
            fn(IndexData $index) => app(CreateStock::class)->execute($index)
        );

        return $next($translatedResponse);
    }
}
