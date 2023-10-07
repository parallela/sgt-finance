<?php

namespace App\Clients;

use App\Data\IndexData;
use App\Enums\Trends;
use App\Http\Translators\SerpIndexResponseTranslator;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Serp
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

    public function getIndexes(): Collection
    {
        $response = $this->client
            ->withQueryParameters([
                'trend' => Trends::INDEXES->value
            ])
            ->get('/search');

        return collect($this->translate($response->json()))->map(
            fn(array $data) => IndexData::from($data)->toArray()
        );
    }

    public function translate(array $response): Collection
    {
        return SerpIndexResponseTranslator::translate($response);
    }
}
