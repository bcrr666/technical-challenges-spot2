<?php

namespace App\Services;

use App\Models\Cadastre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CadastreService
{
    public static function getFilteredCadastres($postalCode, $constructionUseId)
    {
        $cadastres = Cadastre::where('postal_code', $postalCode)
            ->whereNotNull('land_value')
            ->where('construction_area', '>', 0);

        if (empty($constructionUseId)) {
            return $cadastres->get();
        }

        $constructionUseValue = Cadastre::CONSTRUCTION_USES[$constructionUseId] ?? null;
        if (!is_null($constructionUseValue)) {
            $cadastres->where('construction_use', $constructionUseValue);
        }

        return $cadastres->get();
    }
    
    public static function generateResults($cadastres)
    {
        return $cadastres->each(function ($cadastre, $key) {
            $landValue = $cadastre->land_value;
            $subsidy = $cadastre->subsidy;
            $cadastre->price_unit = ($landValue / $cadastre->land_area) - $subsidy;
            $cadastre->price_unit_construction = ($landValue / $cadastre->construction_area) - $subsidy;
        });
    }

    public static function calculateByType(string $type, $cadastres)
    {
        $priceUnit = 0;
        $priceUnitConstruction = 0;
        switch ($type) {
            case 'min':
                $priceUnit = $cadastres->min('price_unit');
                $priceUnitConstruction = $cadastres->min('price_unit_construction');
                break;
            case 'max':
                $priceUnit = $cadastres->max('price_unit');
                $priceUnitConstruction = $cadastres->max('price_unit_construction');
                break;
            case 'avg':
                $priceUnit = $cadastres->avg('price_unit');
                $priceUnitConstruction = $cadastres->avg('price_unit_construction');
                break;
        }

        return [
            'price_unit' => number_format($priceUnit, 2),
            'price_unit_construction' => number_format($priceUnitConstruction, 2)
        ];
    }
}
