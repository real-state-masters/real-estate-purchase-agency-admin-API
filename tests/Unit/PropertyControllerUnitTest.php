<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\API\PropertyController;

class PropertyControllerUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_Index()
    {
        $index = new PropertyController;
        $this->assertGreaterThan(0, count($index->index()));
    }

}
