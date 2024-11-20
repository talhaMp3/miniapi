<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CountryController extends Controller
{
    public function getCountry(Request $request)
    {
        $client = new Client();
        $countryName = $request->input('country'); // Get the country name from the input
        // return view('countries.index')->with('error', 'Could not retrieve country data. Please try again later.');
        // Check if country name is provided
        // if (!$countryName) {
        //     return redirect()->back()->with('error', 'Please enter a country name.');
        // }

        // URL to fetch country by name
        $url = 'https://restcountries.com/v3.1/name/' . urlencode($countryName);

        try {
            $response = $client->get($url);
            $countries = json_decode($response->getBody(), true);

            // Check if we received any country data
            if (empty($countries)) {
                return view('countries.index')->with('error', 'No data found for the specified country.');
            }

            return view('countries.index', ['countries' => $countries]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle specific request errors
            return view('countries.index')->with('error', 'Could not retrieve country data. Please try again later.');
        } catch (\Exception $e) {
            // Handle other exceptions
            return view('countries.index')->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
