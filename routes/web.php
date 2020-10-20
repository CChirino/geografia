<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContinentesController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\RegionesController;
use App\Http\Controllers\GaleriasPaisController;
use App\Http\Controllers\GaleriasRegionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('paises.index');;
});

Route::resource("continentes", ContinentesController::class);
Route::resource("paises", PaisController::class);
Route::resource("regiones", RegionesController::class);
Route::resource("galerias-paises", GaleriasPaisController::class);
Route::resource("galerias-regiones", GaleriasRegionesController::class);


Route::get('admin', function () {
    return view('layouts.index-admin');
});
