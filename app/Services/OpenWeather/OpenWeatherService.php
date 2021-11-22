<?php


namespace App\Services\OpenWeather;

use App\Services\API\IApiService;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Traits\ErrorMessage;
use Illuminate\Support\Facades\Log;

class OpenWeatherService implements IOpenWeatherService
{
    use ErrorMessage;

    private string $baseUrl;
    private string $apiKey;
    private IApiService $apiService;

    public function __construct(IApiService $apiService)
    {
        $this->baseUrl = config('services.openweather.base_uri');
        $this->apiKey = config('services.openweather.api_key');

        $this->apiService = $apiService;
    }

    public function getMapDataByCityName(string $cityName)
    {
            $url = $this->baseUrl . "?q={$cityName}&appid={$this->apiKey}";
            $res = $this->apiService->get($url);
            Log::info("OpenWeatherService.getMapDataByCityName: get data from openweather api", $res);

            if(!$res->successful()) return $this->validationErrorMessage(500, 'OpenWeather API not working at moment. Please try again later.');
    
            return $res->json();
    }
}
