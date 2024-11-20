<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class OpenWeatherService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('0806dddc18bf3a414e37665a72cc5f12');
        $this->baseUrl = 'https://api.openweathermap.org/data/2.5/weather';
    }

    public function fetchWeather($city)
    {
        Log::info("Requesting weather for city: $city");

        try {
            $response = $this->client->request('GET', $this->baseUrl, [
                'query' => [
                    'q' => $city,
                    'appid' => $this->apiKey,
                    'units' => 'metric',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Weather API request failed: ' . $e->getMessage());
            return null;
        }
    }
}
