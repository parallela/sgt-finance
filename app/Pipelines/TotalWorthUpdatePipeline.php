<?php

namespace App\Pipelines;

use App\Actions\CreateStock;
use App\Data\IndexData;
use App\Jobs\StoreWorthPointJob;
use Closure;
use Illuminate\Support\Collection;

class TotalWorthUpdatePipeline
{
    /**
     * @param Collection $translatedResponse
     * @param Closure $next
     * @return mixed
     */
    public function handle(Collection $translatedResponse, Closure $next): mixed
    {
        // Calculate store worth points
        // and dispatch event for update
        // This can be dispatched on different queue but for the simplicity of the project lets leave it like this
        StoreWorthPointJob::dispatch();

        return $next($translatedResponse);
    }
}
