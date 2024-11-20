<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class DictionaryService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        // Create a new Guzzle client instance
        $this->client = new Client();
        // Set the base URL for the API
        $this->baseUrl = 'https://api.dictionaryapi.dev/api/v2/entries/en';
    }

    public function fetchWordData($word)
    {
        try {
            // Make a GET request to the API
            $response = $this->client->request('GET', "{$this->baseUrl}/{$word}", [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            // Decode the JSON response to an array
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Dictionary API request failed: ' . $e->getMessage());
            return null;
        }
    }
}
