<?php

namespace App\Providers;

use App\Clients\Serp;
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
            fn() => new ScrapperService(new Serp())
        );
    }

    /**
     * Here should be all the custom bootable singleton providers, macros
     */
    public function boot(): void
    {
        // Add http provider for communicating the polygon api
        $this->registerPolygonHttpClient();
    }

    /**
     * @return void
     */
    protected function registerPolygonHttpClient(): void
    {
        Http::macro(
            'serp',
            fn() => Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])
                ->withQueryParameters([
                    'api_key' => config('clients.serp.api_key'),
                    'engine' => config('clients.serp.engines.googleFinance')
                ])
                ->baseUrl(config('clients.serp.endpoint'))
        );
    }
}
