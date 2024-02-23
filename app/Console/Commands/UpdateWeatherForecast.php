<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherService;
use App\Models\WeatherForecast;

class UpdateWeatherForecast extends Command
{
    protected $signature = 'weather:update';
    protected $description = 'Update weather forecast data hourly';

    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle()
    {
        $cities = [
            'CDMX' => [
                'lat' => 19.42,
                'lon' => -99.12
            ],
            'Miami' => [
                'lat' => 25.77,
                'lon' => -80.19
            ],
            'New York' => [
                'lat' => 40.71,
                'lon' => -74.00
            ]
        ];

        foreach ($cities as $city) {
            $data = $this->weatherService->getWeatherData($city['lat'], $city['lon'], "metric");

            WeatherForecast::create([
                'city_id' => $data['id'],
                'city_name' => $data['name'],
                'timezone' => $data['timezone'],
                'cod' => $data['cod'],
                'lat' => $data['coord'][0]['lat'],
                'lon' => $data['coord'][0]['lon'],
                'weather_id' => $data['weather'][0]['id'],
                'weather_main' => $data['weather'][0]['main'],
                'weather_description' => $data['weather'][0]['description'],
                'weather_icon' => $data['weather'][0]['icon'],
                'base' => $data['weather'][0]['base'],
                'temp' => $data['main'][0]['temp'],
                'feels_like' => $data['main'][0]['feels_like'],
                'temp_min' => $data['main'][0]['temp_min'],
                'temp_max' => $data['main'][0]['temp_max'],
                'pressure' => $data['main'][0]['pressure'],
                'humidity' => $data['main'][0]['humidity'],
                'visibility' => $data['visibility'],
                'wind_speed' => $data['wind'][0]['speed'],
                'wind_deg' => $data['wind'][0]['deg'],
                'clouds' => $data['clouds'][0]['all'],
                'dt' => $data['dt'],
            ]);
        }

        $this->info('Weather forecast data updated successfully.');
    }
}
