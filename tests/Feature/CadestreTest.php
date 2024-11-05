<?php

namespace Tests\Feature;

use Tests\TestCase;

class CadestreTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/price-m2/zip-codes/01120/aggregate/min?uso_construccion=3');

        $response->assertStatus(200);
    }
}
