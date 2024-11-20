<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NasaController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = 'zeG21paa6hPa6M3ERxG4exv6Ci0oyKAaUbiZubUO'; // Replace with your actual API key
    }

    public function getApod()
    {
        $client = new Client();

        try {
            $response = $client->get('https://api.nasa.gov/planetary/apod', [
                'query' => [
                    'api_key' => $this->apiKey,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return view('nasa.apod', ['apod' => $data]);
        } catch (\Exception $e) {
            return view('nasa.apod')->with('error', 'Could not retrieve data from NASA.');
        }
    }
    public function getMarsRoverPhotos(Request $request)
    {
        $client = new Client();
        $rover = $request->input('rover', 'Curiosity'); // Default to Curiosity
        $sol = $request->input('sol', 1000);
        $page = $request->input('page', 1); // Get the current page number

        try {
            $response = $client->get('https://api.nasa.gov/mars-photos/api/v1/rovers/' . strtolower($rover) . '/photos', [
                'query' => [
                    'sol' => $sol,
                    'api_key' => $this->apiKey,
                    'page' => $page,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return view('nasa.mars_rover_photos', ['photos' => $data['photos'], 'rover' => $rover, 'sol' => $sol]);
        } catch (\Exception $e) {
            return view('nasa.mars_rover_photos')->with('error', 'Could not retrieve Mars Rover Photos.');
        }
    }
}
