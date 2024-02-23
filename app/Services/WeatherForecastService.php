<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherForecastService
{
    protected $apiKey;
    protected $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->apiKey = config('b41c9d57aef350794d96744eb6632378');
        $this->httpClient = $httpClient;
    }

    public function getWeather($lat, $lon, $units)
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=$units&appid=$this->apiKey";
        $response = $this->httpClient->get($url);
        return json_decode($response->getBody()->getContents(), true);
    }
}
