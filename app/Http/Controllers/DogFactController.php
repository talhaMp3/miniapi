<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DogFactController extends Controller
{
    public function getDogFact()
    {
        $client = new Client();

        try {
            $response = $client->get('https://dog-api.kinduff.com/api/facts');
            $data = json_decode($response->getBody(), true);

            return view('dogfacts.index', ['fact' => $data['facts'][0]]);
        } catch (\Exception $e) {
            return view('dogfacts.index')->with('error', 'Could not retrieve dog fact.');
        }
    }
}
