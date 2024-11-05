<?php

namespace App\Http\Controllers;

use App\Models\Cadastre;
use App\Services\CadastreService;
use Illuminate\Http\Request;

class CadastreController extends Controller
{
    public function getPriceM2(string $postalCode, $type, Request $request)
    {
        $cadastres = CadastreService::getFilteredCadastres($postalCode, $request->uso_construccion);
        $resultCadastres = CadastreService::generateResults($cadastres);
        $calculateResult = CadastreService::calculateByType($type, $resultCadastres);

        return [
            "status" => true,
            "payload" => [
                "type" => $type,
                "price_unit" => $calculateResult['price_unit'],
                "price_unit_construction" => $calculateResult['price_unit_construction'],
                "elements" => $cadastres->count()
            ]
        ];
    }
}
