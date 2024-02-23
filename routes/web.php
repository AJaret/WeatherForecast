<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\WeatherController;
 
Route::get('/', function(){
    return view('index');
});
// Route::get('/', function(){
//     $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=19.42&lon=-99.12&appid=b41c9d57aef350794d96744eb6632378&units=metric');
//     dd($response->json());
// });

Route::get('weather/{city}', [WeatherController::class, 'getWeather']);