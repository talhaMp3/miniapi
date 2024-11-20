<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CoinController extends Controller
{
    private $apiKey;
    private $limit = 10; // Set the number of coins per page

    public function __construct()
    {
        $this->apiKey = '2230339F-3DA6-4376-AB5D-74EC41D31163'; // Replace with your actual API key
    }

    public function getCoins(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->get('https://rest.coinapi.io/v1/assets', [
                'headers' => [
                    'X-CoinAPI-Key' => $this->apiKey,
                ],
            ]);
            $coins = json_decode($response->getBody(), true);

            // Get the current page number from the request or default to 1
            $currentPage = $request->input('page', 1);
            // Create a new collection from the coins
            $coinCollection = collect($coins);
            // Slice the collection to get the coins for the current page
            $paginatedCoins = $coinCollection->slice(($currentPage - 1) * $this->limit, $this->limit)->all();

            // Create a LengthAwarePaginator instance
            $paginatedResults = new LengthAwarePaginator(
                $paginatedCoins,
                $coinCollection->count(),
                $this->limit,
                $currentPage,
                ['path' => $request->url(), 'query' => $request->query()] // Maintain query parameters in pagination links
            );
// dd($paginatedResults);
            return view('coins.index', [
                'coins' => $paginatedResults,
            ]);
        } catch (\Exception $e) {
            return view('coins.index')->with('error', 'Could not retrieve coin data.');
        }
    }

    
}
