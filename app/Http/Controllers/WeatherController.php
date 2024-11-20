<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $weatherData = null;

        // Check if the form was submitted
        if ($request->isMethod('get') && $request->has('city')) {
            $city = $request->input('city'); // Get city from request

            // Check if the city is empty
            if (empty($city)) {
                return back()->withErrors(['city' => 'Please enter a city name.']);
            }

            $apiKey = '0806dddc18bf3a414e37665a72cc5f12'; // Replace with your OpenWeatherMap API key
            $client = new Client();

            try {
                $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric");
                $weatherData = json_decode($response->getBody(), true);
            } catch (\Exception $e) {
                // Handle any errors
                return back()->withErrors(['city' => 'Could not retrieve weather data.']);
            }
        }

        return view('weather.index', compact('weatherData'));
    }


}
// https://api.openweathermap.org/data/2.5/weather?q=surat&appid=0806dddc18bf3a414e37665a72cc5f12&units=metric