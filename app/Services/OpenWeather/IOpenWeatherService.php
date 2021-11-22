<?php


namespace App\Services\OpenWeather;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

interface IOpenWeatherService
{
    public function getMapDataByCityName(string $cityName);
}
