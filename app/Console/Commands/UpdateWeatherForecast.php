<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherForecastService;
use App\Models\WeatherForecast;

class UpdateWeatherForecast extends Command
{
    protected $signature = 'weather:update';
    protected $description = 'Update weather forecast data hourly';

    protected $weatherForecastService;

    public function __construct(WeatherForecastService $weatherForecastService)
    {
        parent::__construct();
        $this->weatherForecastService = $weatherForecastService;
    }

    public function handle():void
    {
        try{
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
                $data = $this->weatherForecastService->getWeatherData($city['lat'], $city['lon'], "metric");
                // dd($data);
                WeatherForecast::create([
                    'city_id' => $data['id'],
                    'city' => $data['name'],
                    'timezone' => $data['timezone'],
                    'cod' => $data['cod'],
                    'lat' => $data['coord']['lat'],
                    'lon' => $data['coord']['lon'],
                    'weather_id' => $data['weather'][0]['id'],
                    'weather_main' => $data['weather'][0]['main'],
                    'weather_description' => $data['weather'][0]['description'],
                    'weather_icon' => $data['weather'][0]['icon'],
                    'base' => $data['base'],
                    'temp' => $data['main']['temp'],
                    'feels_like' => $data['main']['feels_like'],
                    'temp_min' => $data['main']['temp_min'],
                    'temp_max' => $data['main']['temp_max'],
                    'pressure' => $data['main']['pressure'],
                    'humidity' => $data['main']['humidity'],
                    'visibility' => $data['visibility'],
                    'wind_speed' => $data['wind']['speed'],
                    'wind_deg' => $data['wind']['deg'],
                    'clouds' => $data['clouds']['all'],
                    'dt' => $data['dt'],
                ]);
            }
    
            $this->info('Weather forecast data updated successfully.');
        }catch (\Exception $e) {
            \Log::error('Error updating weather forecast: ' . $e->getMessage());
            $this->error('Error updating weather forecast: ' . $e->getMessage());
        }
    }
}
