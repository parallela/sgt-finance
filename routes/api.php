<?php

use App\Enums\RoutePrefixes;
use App\Http\Controllers\Data\StockController;
use App\Http\Controllers\Metrics\WorthController;
use Illuminate\Support\Facades\Route;

// Prefixes for the main api routes

/**
 * Getting the metrics that are responsible for the daily statistics
 */
Route::group(['prefix' => RoutePrefixes::METRICS->value], function () {
    Route::get('/stocks', [StockController::class, 'index'])->name(
        'api.metrics.stocks'
    );

    // Getting the total worth of all stocks for the last 25 days.
    Route::get('/total-worth', [WorthController::class, 'index'])->name(
        'api.metrics.total-worth'
    );
});
