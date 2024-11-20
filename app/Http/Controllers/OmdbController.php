<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OmdbController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = 'df073f74'; // Replace with your OMDb API key
    }

    public function searchMovie(Request $request)
    {
        $client = new Client();
        $title = $request->input('title'); // Movie title from user input

        try {
            $response = $client->get('http://www.omdbapi.com/', [
                'query' => [
                    't' => $title,
                    'apikey' => $this->apiKey,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return view('omdb.movie', ['movie' => $data]);
        } catch (\Exception $e) {
            return view('omdb.movie')->with('error', 'Could not retrieve movie data.');
        }
    }
}
