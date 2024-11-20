<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CatFactsController extends Controller
{
    public function getCatFact()
    {
        $client = new Client();

        try {
            $response = $client->get('https://catfact.ninja/fact');
            $data = json_decode($response->getBody(), true);

            return view('catfacts.index', ['fact' => $data['fact']]);
        } catch (\Exception $e) {
            return view('catfacts.index')->with('error', 'Could not retrieve cat fact.');
        }
    }
}
