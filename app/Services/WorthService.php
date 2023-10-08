<?php

namespace App\Services;

use App\Contracts\Servicable;
use App\Data\TotalWorthData;
use App\Models\Price;
use Illuminate\Support\Collection;
use InfluxDB\Database;
use InfluxDB\Database\Exception;
use InfluxDB\Point;
use InfluxDB\ResultSet;
use TrayLabs\InfluxDB\Facades\InfluxDB;

class WorthService implements Servicable
{
    public float $totalWorth;

    /**
     * Store the total worth to the
     * influxDB, after that display the list for all total worth
     * @throws Exception
     * @throws \Exception
     */
    public function store(): Collection
    {
        InfluxDB::writePoints(
            [
                new Point(
                    measurement: 'total_worth',
                    value: (string) $this->totalWorth,
                    tags: ['worth'],
                    timestamp: now()->timestamp
                )
            ],
            Database::PRECISION_SECONDS
        );

        return $this->show();
    }

    public function update()
    {
    }

    /**
     * Get the total worth for all stocks
     * @return WorthService
     */
    public function calculateTotalWorth(): static
    {
        $this->totalWorth = Price::groupBy('stock_id')
            ->latest()
            ->sum('price');

        return $this;
    }

    public function show(): Collection
    {
        // Get all the stored points with range 25 days
        $builder = InfluxDB::getQueryBuilder()
            ->from('total_worth')
            ->where(['time <= now()', 'time >= now() -25d'])
            ->getQuery();

        return collect(InfluxDB::query($builder)->getPoints())->map(
            fn(array $point) => new TotalWorthData(
                now()->parse($point['time']),
                $point['value']
            )
        );
    }
}
