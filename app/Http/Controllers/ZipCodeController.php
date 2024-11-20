<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ZipCodeController extends Controller
{
    public function lookup(Request $request)
    {
        $client = new Client();
        $postalCode = $request->input('postalcode');
        $country = $request->input('country');
        $username = 'damamet'; // Replace with your GeoNames username

        try {
            $response = $client->get("http://api.geonames.org/postalCodeLookupJSON", [
                'query' => [
                    'postalcode' => $postalCode,
                    'country' => $country,
                    'username' => $username,
                ],
            ]);

            $locationData = json_decode($response->getBody(), true);
// dd($locationData);
            // Check if the 'postalcodes' array exists and has data
            if (isset($locationData['postalcodes']) && count($locationData['postalcodes']) > 0) {
                return view('zipcode.index', ['location' => $locationData['postalcodes'][0]]);
            } else {
                return view('zipcode.index')->with(['error' => 'No location data found for the provided postal code.']);
            }
        } catch (\Exception $e) {
            return view('zipcode.index')->with(['error' => 'Error fetching location data: ' . $e->getMessage()]);
        }
    }

    public function index()
    {
        return view('zipcode.index');
    }
}
