<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RiverControllerTest extends TestCase
{
    public function test_show_river_detail()
    {
        $river = RiverLocation::first();

        $slug = \Illuminate\Support\Str::slug(
            $river->river_name
        );

        $response = $this->get(
            '/sungai/' . $slug
        );

        $response->assertStatus(200);
    }
}
