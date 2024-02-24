<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherForecastService
{
    protected $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getWeatherData($lat, $lon, $units)
    {
        $apiKey = 'b41c9d57aef350794d96744eb6632378';
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=$units&appid=$apiKey";
        $response = $this->httpClient->get($url);
        return json_decode($response->getBody()->getContents(), true);
    }
}
