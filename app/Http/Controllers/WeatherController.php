<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\OpenWeather\IOpenWeatherService;
use App\Http\Requests\OpenWeather\OpenWeatherByCityRequest;
use Illuminate\Support\Facades\View;

class WeatherController extends Controller
{
    private IOpenWeatherService $openWeatherService;

    public function __construct(IOpenWeatherService $openWeatherService)
    {
        $this->openWeatherService = $openWeatherService;
    }

    public function generate(Request $request)
    {   
        $mapData = $this->openWeatherService->getMapDataByCityName($request->query('city'));
        
        return view('welcome',[
            'map'=> $mapData,
        ]);
    }
}
