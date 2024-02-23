<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather_forecasts', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('city');
            $table->integer('timezone');
            $table->integer('cod');
            $table->float('lat');
            $table->float('lon');
            $table->integer('weather_id');
            $table->string('weather_main');
            $table->string('weather_description');
            $table->string('weather_icon');
            $table->string('base');
            $table->float('temp');
            $table->float('feels_like');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('pressure');
            $table->float('humidity');
            $table->integer('visibility');
            $table->float('wind_speed');
            $table->float('wind_deg');
            $table->integer('clouds');
            $table->integer('dt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_forecasts');
    }
};
