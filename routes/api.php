<?php

use App\Enums\RoutePrefixes;
use App\Http\Controllers\Metrics\WorthController;
use Illuminate\Support\Facades\Route;

// Prefixes for the main api routes

/**
 * Getting the metrics that are responsible for the daily statistics
 */
Route::group(['prefix' => RoutePrefixes::METRICS->value], function () {
    // Getting the total worth of all stocks for the last 25 days.
    Route::get('/total-worth', [WorthController::class, 'index']);
});
