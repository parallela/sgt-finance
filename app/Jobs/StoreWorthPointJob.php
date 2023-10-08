<?php

namespace App\Jobs;

use App\Events\WorthUpdatedEvent;
use App\Services\WorthService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use InfluxDB\Database\Exception;

class StoreWorthPointJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    /**
     * Save the total worth into influxdb
     * for getting information after that
     * @throws Exception
     */
    public function handle(): void
    {
        // Calculate the total worth
        // And store into influxdb
        $totalWorth = app(WorthService::class)
            ->calculateTotalWorth()
            ->store();

        // Dispatch an event for updating the worth
        event(new WorthUpdatedEvent($totalWorth));
    }
}
