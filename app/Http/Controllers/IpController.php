<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IpController extends Controller
{
    public function getIp()
    {
        $client = new Client();

        try {
            // Fetch the public IP address
            $response = $client->get('https://api.ipify.org?format=json');
            $data = json_decode($response->getBody(), true);
// dd($data);
            // Return the view with the IP address
            return view('ipify.index', ['ip' => $data['ip']]);
        } catch (\Exception $e) {
            // Handle errors and return the view with an error message
            return view('ipify.index')->with('error', 'Could not retrieve IP address: ' . $e->getMessage());
        }
    }
}
