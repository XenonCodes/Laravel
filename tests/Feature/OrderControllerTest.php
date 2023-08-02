<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testOrderFormPageIsAccessible()
    {
        $response = $this->get('/order-form');
        $response->assertStatus(200);
    }
}
