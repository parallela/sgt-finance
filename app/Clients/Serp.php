<?php

namespace App\Clients;

use App\Contracts\Clientable;
use App\Data\IndexData;
use App\Enums\Trends;
use App\Http\Translators\SerpIndexResponseTranslator;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Serp implements Clientable
{
    /**
     * The main client instance that will be used
     *
     * @var PendingRequest
     */
    protected PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::serp();
    }

    public function getIndexes(): array
    {
        $response = $this->client
            ->withQueryParameters([
                'trend' => Trends::INDEXES->value
            ])
            ->get('/search');

        return $response->json();
    }
}
