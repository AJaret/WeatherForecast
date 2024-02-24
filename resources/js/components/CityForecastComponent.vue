<template>
    <label for="selectedCity">Select a city</label>
    <select id="selectedCity" @change="handleCityChange" class="form-select form-select-md mt-3 mb-5">
      <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
    </select>

    <div class="table-responsive">
        <table v-if="weatherData" class="table table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>City ID</th>
                <th>City</th>
                <th>Time Zone</th>
                <th>Cod</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Weather ID</th>
                <th>Weather Main</th>
                <th>Weather Description</th>
                <th>Weather Icon</th>
                <th>Base</th>
                <th>Temperature</th>
                <th>Feels Like</th>
                <th>Min Temperature</th>
                <th>Max Temperature</th>
                <th>Pressure</th>
                <th>Humidity</th>
                <th>Visibility</th>
                <th>Wind Speed</th>
                <th>Wind Deg</th>
                <th>Clouds</th>
                <th>DT</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="data in weatherData" :key="data.id" scope="row">
                <td>{{ data.id }}</td>
                <td>{{ data.city_id }}</td>
                <td>{{ data.city }}</td>
                <td>{{ data.timezone }}</td>
                <td>{{ data.cod }}</td>
                <td>{{ data.lat }}</td>
                <td>{{ data.lon }}</td>
                <td>{{ data.weather_id }}</td>
                <td>{{ data.weather_main }}</td>
                <td>{{ data.weather_description }}</td>
                <td> <img :src="`https://openweathermap.org/img/wn/${data.weather_icon}.png`" alt="Icono del clima"></td>
                <td>{{ data.base }}</td>
                <td>{{ data.temp }}</td>
                <td>{{ data.feels_like }}</td>
                <td>{{ data.temp_min }}</td>
                <td>{{ data.temp_max }}</td>
                <td>{{ data.pressure }}</td>
                <td>{{ data.humidity }}</td>
                <td>{{ data.visibility }}</td>
                <td>{{ data.wind_speed }}</td>
                <td>{{ data.wind_deg }}</td>
                <td>{{ data.clouds }}</td>
                <td>{{ data.dt }}</td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            <h3>An error ocurred while making the request, try chaging the city option</h3>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                selectedCity: 'Mexico City',
                cities: ['Mexico City', 'Miami', 'New York'],
                weatherData: null
            };
        },
        mounted() {
            this.fetchWeatherData();
        },
        methods: {
            fetchWeatherData() {
            axios.get(`/api/weather?city=${this.selectedCity}`)
                .then(response => {
                    this.weatherData = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
            },
            handleCityChange(event) {
                this.selectedCity = event.target.value;
                this.fetchWeatherData();            
            }
        }
    };
</script>
