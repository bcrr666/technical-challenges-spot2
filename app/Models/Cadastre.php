<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastre extends Model
{
    use HasFactory;

    const CONSTRUCTION_USE_GREEN_AREAS = 1;
    const CONSTRUCTION_USE_NEIGHBORHOOD_CENTER = 2;
    const CONSTRUCTION_USE_EQUIPMENT = 3;
    const CONSTRUCTION_USE_RESIDENTIAL = 4;
    const CONSTRUCTION_USE_RESIDENTIAL_AND_COMMERCIAL = 5;
    const CONSTRUCTION_USE_INDUSTRIAL = 6;
    const CONSTRUCTION_USE_WITHOUT_ZONING = 7;

    const CONSTRUCTION_USES = [
        1 => ['Áreas verdes'],
        2 => ['Centro de barrio'],
        3 => ['Equipamiento'],
        4 => ['Habitacional'],
        5 => ['Habitacional y comercial'],
        6 => ['Industrial'],
        7 => ['Sin Zonificación'],
    ];
};
