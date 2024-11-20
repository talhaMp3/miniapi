<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GenderizeController extends Controller
{
    public function getGender(Request $request)
    {
        $client = new Client();
        $name = $request->input('name');

        if (!$name) {
            return view('genderize.index')->with('error', 'Please provide a name.');
        }

        $apiKey = '832d32d580a40e3527d6cddfaea32a9b'; // Replace with your API key https://api.genderize.io?name=talha&apikey=832d32d580a40e3527d6cddfaea32a9b

        try {
            $response = $client->get("https://api.genderize.io?name=$name");
            $data = json_decode($response->getBody(), true);
// dd($data);
            return view('genderize.index', ['gender' => $data['gender'], 'probability' => $data['probability'], 'name' => $name]);
        } catch (\Exception $e) {
            return view('genderize.index')->with('error', 'Could not retrieve gender information.');
        }
    }
}
