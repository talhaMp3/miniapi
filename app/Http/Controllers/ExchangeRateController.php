<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ExchangeRateController extends Controller
{
    public function getExchangeRate(Request $request)
    {
        $client = new Client();
        $apiKey = '5c66923e019ef01598cf953e'; // Replace with your API key
        $baseCurrency = $request->input('base', 'USD'); // Default to USD if not provided

        try {
            $response = $client->get("https://v6.exchangerate-api.com/v6/$apiKey/latest/$baseCurrency");
            $data = json_decode($response->getBody(), true);
            // dd($data);
            return view('exchange.index', ['exchangeRates' => $data['conversion_rates'], 'baseCurrency' => $baseCurrency]);
        } catch (\Exception $e) {
            return view('exchange.index')->with('error', 'Could not retrieve exchange rates.');
        }
    }
}
