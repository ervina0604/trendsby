<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SentimentSummaryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_sentiment_summary()
{
    $data = [
        'positif',
        'positif',
        'negatif'
    ];

    $positif = count(
        array_filter(
            $data,
            fn($x) => $x === 'positif'
        )
    );

    $this->assertEquals(
        2,
        $positif
    );
}
}
