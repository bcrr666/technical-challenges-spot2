<?php

namespace Tests\Unit;

use App\Services\CadastreService;
use PHPUnit\Framework\TestCase;

class CalculateByTypeTest  extends TestCase
{
    public function testCalculateMinPriceUnit()
    {
        $cadastresData = collect([
            (object) ['price_unit' => 10, 'price_unit_construction' => 15],
            (object) ['price_unit' => 20, 'price_unit_construction' => 25],
        ]);

        $result = CadastreService::calculateByType('min', $cadastresData);

        $this->assertEquals('10.00', $result['price_unit']);
        $this->assertEquals('15.00', $result['price_unit_construction']);
    }
}
