<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\OpenWeather\IOpenWeatherService;
use App\Http\Requests\OpenWeather\OpenWeatherByCityRequest;

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

Route::get('/', function(Request $request) {
    return view('maps');
});

// Route::get('/map', 'WeatherController@generate');
Route::get('/map', [WeatherController::class, 'generate']);