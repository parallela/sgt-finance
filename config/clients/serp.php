<?php

return [
    /**
     * Endpoint
     */
    'endpoint' => env('SERP_API', 'https://serpapi.com/'),

    /**
     * The api key that will be corresponded for getting a data from the api
     */
    'api_key' => env('SERP_API_KEY', ''),

    /**
     * Engines that we need for scrapping information
     * All engine values are values that the api can parse.
     *
     * For more information about all available engines, please read the docs.
     * @docs https://serpapi.com/google-finance-markets
     */
    'engines' => [
        'googleFinance' => 'google_finance_markets'
    ]
];
