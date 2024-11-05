<?php

namespace Tests\Unit;

use App\Services\CadastreService;
use PHPUnit\Framework\TestCase;

class GenerateResultsTest extends TestCase
{
    public function testGenerateResultsWithCalculatedPriceUnits()
    {
        $cadastresData = collect([
            (object) ['land_area' => 100, 'land_value' => 50000, 'subsidy' => 1000, 'construction_area' => 50],
        ]);

        $results = CadastreService::generateResults($cadastresData);

        $this->assertEquals((100 / 50000) - 1000, $results[0]->price_unit);
        $this->assertEquals((50 / 50000) - 1000, $results[0]->price_unit_construction);
    }
}
