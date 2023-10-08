<?php

namespace Tests\Feature;

use Tests\TestCase;

class TotalWorthTest extends TestCase
{
    public function testBasic()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
