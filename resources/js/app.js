import { createApp } from 'vue/dist/vue.esm-browser.js';
import './bootstrap';
import CityForecastComponent from './components/CityForecastComponent.vue';

const App = createApp({});
App.component('city-forecast', CityForecastComponent);
App.mount('#app');