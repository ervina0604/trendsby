<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrioritasControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_prioritas_index()
    {
        $response = $this->get('/prioritas');

        $response->assertStatus(200);
    }
}
