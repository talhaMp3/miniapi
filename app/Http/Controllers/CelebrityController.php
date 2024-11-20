<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CelebrityController extends Controller
{
    public function getCelebrity(Request $request)
    {
        $client = new Client();
        $name = $request->input('name'); // Get the celebrity name from input

        try {
            $response = $client->get('https://api.api-ninjas.com/v1/celebrity', [
                'headers' => [
                    'X-Api-Key' => 'kPmg3pq8+vr2HdyI1TibvQ==3eFEdM8cGXx0qkP6', // Replace with your API key
                ],
                'query' => ['name' => $name],
            ]);
            $data = json_decode($response->getBody(), true);
// dd($data);
            return view('celebrities.index', ['celebrities' => $data]);
        } catch (\Exception $e) {
            return view('celebrities.index')->with('error', 'Could not retrieve celebrity information.');
        }
    }
}
