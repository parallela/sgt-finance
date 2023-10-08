<?php

namespace App\Services;

use App\Contracts\Clientable;
use App\Contracts\Servicable;

class ScrapperService implements Servicable
{
    public function __construct(public Clientable $client)
    {
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function show(): array
    {
        return $this->client->getIndexes();
    }
}
