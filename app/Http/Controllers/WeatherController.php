<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherForecast;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $city = $request->input('city');
        $weatherData = WeatherForecast::where('city', $city)->get();

        return response()->json($weatherData);
    }
}