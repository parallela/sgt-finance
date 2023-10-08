<?php

namespace Tests\Feature;

use Tests\TestCase;

class StockTest extends TestCase
{
    public function testStockWillReturnSuccessfullResponse()
    {
        $response = $this->get(route('api.metrics.stocks'));

        $response->assertStatus(200);
    }
}
