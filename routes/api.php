<?php

use App\Http\Controllers\CadastreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('price-m2/zip-codes/{zipCode}/aggregate/{type}', [CadastreController::class, 'getPriceM2']);
