<?php

namespace App\Jobs;

use App\Services\ScrapperService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Pipeline\Pipeline;

class StocksDataScrapperJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function handle(): void
    {
        app(Pipeline::class)
            ->send(app(ScrapperService::class)->show())
            ->through(config('pipelines.store_by_response'))
            ->thenReturn();


        //TODO: schedule a job for calculating the total worth
    }
}
