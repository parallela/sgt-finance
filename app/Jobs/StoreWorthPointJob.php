<?php

namespace App\Jobs;

use App\Services\WorthService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use TrayLabs\InfluxDB\Facades\InfluxDB;
use InfluxDB\Database\Exception;
use InfluxDB\Point;
use InfluxDB\Database;

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
        $totalWorth = app(WorthService::class)->calculateTotalWorth();

        // Write the point to the influx
        InfluxDB::writePoints(
            [
                new Point(
                    measurement: 'total_worth',
                    value: $totalWorth,
                    tags: ['worth'],
                    timestamp: now()->timestamp
                )
            ],
            Database::PRECISION_SECONDS
        );
    }
}
