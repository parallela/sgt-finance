<?php

namespace App\Actions;

use InfluxDB\Database;
use InfluxDB\Database\Exception;
use InfluxDB\Point;
use TrayLabs\InfluxDB\Facades\InfluxDB;

class CreateTotalWorth
{
    /**
     * Create a total worth into influxdb storage
     *
     * @param float $totalWorth
     * @return bool
     * @throws Exception
     */
    public function execute(float $totalWorth): bool
    {
        InfluxDB::writePoints(
            [
                new Point(
                    measurement: 'total_worth',
                    value: (string) $totalWorth,
                    tags: ['worth'],
                    timestamp: now()->timestamp
                )
            ],
            Database::PRECISION_SECONDS
        );

        return true;
    }
}
