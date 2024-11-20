<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NumbersController extends Controller
{
    public function getFact(Request $request)
    {
        $client = new Client();
        $number = $request->input('number'); // Get the number from the form
        $type = $request->input('type'); // Get the type from the form

        try {
            // Construct the API URL based on the type
            if ($type === 'date') {
                $response = $client->get("http://numbersapi.com/{$number}/date");
            } elseif ($type == 'math') {
                
                $response = $client->get("http://numbersapi.com/{$number}/math");
            } elseif ($type == 'random') {
                $response = $client->get("http://numbersapi.com/{$number}");
            }

            $fact = $response->getBody()->getContents();

            // Return the view with the fact
            return view('numbers.index', ['fact' => $fact, 'number' => $number]);
        } catch (\Exception $e) {
            // Handle errors and return the view with an error message
            return view('numbers.index')->with('error', 'Could not retrieve number fact: ' . $e->getMessage());
        }
    }
}
