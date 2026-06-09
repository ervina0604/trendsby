<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IssuePercentageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_issue_percentage()
{
    $data = [
        'Sampah',
        'Sampah',
        'Sedimen',
        'Limbah'
    ];

    $this->assertCount(
        4,
        $data
    );
}
}
