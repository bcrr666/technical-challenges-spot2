<?php

namespace App\Http\Controllers;

use App\Models\Cadastre;
use App\Services\CadastreService;
use Illuminate\Http\Request;

class CadastreController extends Controller
{
    /**
     * @OA\Get(
     *     path="/price-m2/zip-codes/{zipCode}/aggregate/{type}",
     *     summary="Get aggregated price data",
     *     description="Returns aggregated price data for a given zip code and type",
     *     @OA\Parameter(
     *         name="zipCode",
     *         in="path",
     *         required=true,
     *         description="Zip code to fetch data for (string)",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="type",
     *         in="path",
     *         required=true,
     *         description="Type of aggregation (min, max, avg)",
     *         @OA\Schema(type="string", enum={"min", "max", "avg"})
     *     ),
     *     @OA\Parameter(
     *         name="uso_construccion",
     *         in="query",
     *         required=false,
     *         description="Usage construction parameter (1 to 7)",
     *         @OA\Schema(type="integer", minimum=1, maximum=7, example=3)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="payload", type="object",
     *                 @OA\Property(property="type", type="string", example="avg"),
     *                 @OA\Property(property="price_unit", type="integer", example=1420),
     *                 @OA\Property(property="price_unit_construction", type="integer", example=3120),
     *                 @OA\Property(property="elements", type="integer", example=100)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Data not found",
     *     )
     * )
     */
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
