<?php

namespace App\Providers;

use App\Services\WorthService;
use Illuminate\Support\ServiceProvider;

class SgtFinanceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(WorthService::class, fn () => new WorthService());
    }

    public function boot(): void
    {
        //Here should be all the custom bootable singleton providers
    }
}
