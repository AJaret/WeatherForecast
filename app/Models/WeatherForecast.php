<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherForecast extends Model
{
    protected $fillable = ['city_id', 'city', 'timezone', 'cod', 'lat', 'lon', 'weather_id', 'weather_main', 'weather_description', 'weather_icon', 'base', 'temp', 'feels_like', 'temp_min', 'temp_max', 'pressure', 'humidity', 'visibility', 'wind_speed', 'wind_deg', 'clouds', 'dt'];
}
