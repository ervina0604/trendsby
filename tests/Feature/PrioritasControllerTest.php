<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrioritasControllerTest extends TestCase
{
    public function test_kategori_sampah()
    {
        $caption = "Terdapat banyak sampah plastik di sungai";

        $this->assertStringContainsString(
            "sampah",
            strtolower($caption)
        );
    }

    public function test_kategori_sedimen()
{
    $caption =
        "Endapan lumpur menyebabkan sungai dangkal";

    $this->assertStringContainsString(
        "lumpur",
        strtolower($caption)
    );
}

public function test_kategori_limbah()
{
    $caption =
        "Pencemaran limbah cair industri";

    $this->assertStringContainsString(
        "limbah",
        strtolower($caption)
    );
}
}