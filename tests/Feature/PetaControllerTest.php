<?php

namespace Tests\Feature;

use Tests\TestCase;

class PetaControllerTest extends TestCase
{
    public function test_peta_index()
    {
        $response = $this->get('/peta');

        $response->assertStatus(200);
    }
}