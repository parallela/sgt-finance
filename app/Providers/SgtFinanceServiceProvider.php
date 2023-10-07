<?php

namespace App\Providers;

use App\Clients\Polygon;
use App\Services\ScrapperService;
use App\Services\WorthService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class SgtFinanceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        /**
         * Bind a singleton of WorthService that will be corresponded for saving the data into the database and influx storage
         */
        $this->app->singleton(WorthService::class, fn() => new WorthService());

        /**
         * Bind a singleton of ScrapperService that will be corresponded for scrapping
         */
        $this->app->singleton(
            ScrapperService::class,
            fn() => new ScrapperService(new Polygon())
        );
    }

    /**
     * Here should be all the custom bootable singleton providers, macros
     */
    public function boot(): void
    {
        // Add http provider for communicating the polygon api
        Http::macro(
            'polygon',
            fn() => Http::withHeaders([
                'Authorization' =>
                    'Bearer ' . config('clients.polygon.api_key'), // Providing API key for the requests
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])
        );
    }
}
